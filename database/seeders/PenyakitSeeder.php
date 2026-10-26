<?php

namespace Database\Seeders;

use App\Models\Penyakit;
use Illuminate\Database\Seeder;

class PenyakitSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'kode' => 'P01',
                'nama' => 'Hawar Daun',
            ],
            [
                'kode' => 'P02',
                'nama' => 'Tungro',
            ],
            [
                'kode' => 'P03',
                'nama' => 'Blast',
            ],
            [
                'kode' => 'P04',
                'nama' => 'Kerdil Rumput',
            ],
        ];

        foreach ($data as $item) {
            Penyakit::updateOrCreate(
                ['kode' => $item['kode']],
                $item
            );
        }
    }
}