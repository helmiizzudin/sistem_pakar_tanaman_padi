<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Penyakit extends Model
{
    protected $table = 'penyakit';

    protected $fillable = [
        'kode',
        'nama',
        'deskripsi',
        'penanganan',
    ];

    public function gejala(): BelongsToMany
    {
        return $this->belongsToMany(
            Gejala::class,
            'penyakit_gejala',
            'penyakit_id',
            'gejala_id'
        )->withPivot('bobot')->withTimestamps();
    }
}