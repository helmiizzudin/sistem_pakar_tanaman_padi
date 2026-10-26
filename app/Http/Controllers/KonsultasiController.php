<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Services\DiagnosisService;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function index()
    {
        $gejala = Gejala::orderBy('kode')->get();

        return view('konsultasi.index', compact('gejala'));
    }

    public function diagnosis(
        Request $request,
        DiagnosisService $service
    ) {
        $data = $request->validate([
            'gejala' => ['required', 'array', 'min:1'],
            'gejala.*' => [
                'required',
                'string',
                'distinct',
                'exists:gejala,kode',
            ],
        ]);

        $hasil = $service->diagnose($data['gejala']);

        $diagnosisUtama = $hasil->first();

        return view('konsultasi.hasil', compact(
            'hasil',
            'diagnosisUtama'
        ));
    }
}
