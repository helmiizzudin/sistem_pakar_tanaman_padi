<?php

namespace App\Services;

use App\Models\Penyakit;
use Illuminate\Support\Collection;
use InvalidArgumentException;

class DiagnosisService
{
    public function diagnose(array $gejalaTerpilih): Collection
    {
        $kodeGejalaTerpilih = array_unique($gejalaTerpilih);

        $penyakitList = Penyakit::with('gejala')->get();

        $hasil = $penyakitList->map(function ($penyakit) use ($kodeGejalaTerpilih) {
            $totalBobot = $penyakit->gejala->sum(
                fn ($gejala) => (float) $gejala->pivot->bobot
            );

            $bobotCocok = $penyakit->gejala
                ->filter(fn ($gejala) =>
                    in_array($gejala->kode, $kodeGejalaTerpilih, true)
                )
                ->sum(fn ($gejala) => (float) $gejala->pivot->bobot);

            $similarity = $totalBobot > 0
                ? $bobotCocok / $totalBobot
                : 0;

            return [
                'kode' => $penyakit->kode,
                'nama' => $penyakit->nama,
                'deskripsi' => $penyakit->deskripsi,
                'penanganan' => $penyakit->penanganan,
                'bobot_cocok' => $bobotCocok,
                'total_bobot' => $totalBobot,
                'similarity' => $similarity,
                'persentase' => round($similarity * 100, 2),
            ];
        });

        return $hasil
            ->sortByDesc('similarity')
            ->values();
    }
}
