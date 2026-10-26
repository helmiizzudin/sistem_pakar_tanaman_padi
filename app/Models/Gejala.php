<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Gejala extends Model
{
    protected $table = 'gejala';

    protected $fillable = [
        'kode',
        'nama',
        'deskripsi',
    ];

    public function penyakit()
    {
        return $this->belongsToMany(
            Penyakit::class,
            'penyakit_gejala',
            'gejala_id',
            'penyakit_id'
        )->withPivot('bobot');
    }
}