<?php

namespace Database\Seeders;

use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Database\Seeder;

class PenyakitGejalaSeeder extends Seeder
{
    public function run(): void
    {
        $basisKasus = [
            'P01' => [
                'G01' => 5,
                'G02' => 5,
                'G03' => 3,
                'G05' => 3,
                'G07' => 1,
                'G08' => 1,
                'G11' => 5,
                'G12' => 5,
                'G13' => 1,
                'G19' => 3,
                'G21' => 1,
            ],

            'P02' => [
                'G07' => 1,
                'G08' => 1,
                'G09' => 5,
                'G10' => 3,
                'G13' => 1,
                'G14' => 5,
                'G15' => 5,
                'G21' => 1,
            ],

            'P03' => [
                'G04' => 5,
                'G05' => 3,
                'G06' => 5,
                'G07' => 1,
                'G08' => 1,
                'G13' => 1,
            ],

            'P04' => [
                'G13' => 1,
                'G16' => 5,
                'G17' => 5,
                'G18' => 5,
                'G19' => 3,
                'G20' => 5,
                'G21' => 1,
                'G22' => 5,
            ],
        ];

        foreach ($basisKasus as $kodePenyakit => $dataGejala) {
            $penyakit = Penyakit::where(
                'kode',
                $kodePenyakit
            )->firstOrFail();

            $relasi = [];

            foreach ($dataGejala as $kodeGejala => $bobot) {
                $gejala = Gejala::where(
                    'kode',
                    $kodeGejala
                )->firstOrFail();

                $relasi[$gejala->id] = [
                    'bobot' => $bobot,
                ];
            }

            $penyakit->gejala()->sync($relasi);
        }
    }
}