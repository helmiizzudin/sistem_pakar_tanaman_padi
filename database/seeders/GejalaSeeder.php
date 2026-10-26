<?php

namespace Database\Seeders;

use App\Models\Gejala;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'G01' => 'Mirip tanaman yang terserang penggerek batang atau terkena air panas',
            'G02' => 'Timbulnya bercak abu-abu (kekuningan) pada tepi daun',
            'G03' => 'Daun dalam keadaan parah, layu dan mati',
            'G04' => 'Malai tidak mampu menopang malai dan patah',
            'G05' => 'Bercak coklat kehitaman pada pangkal leher',
            'G06' => 'Pusat bercak berwarna putih',
            'G07' => 'Berbentuk belah ketupat',
            'G08' => 'Bercak coklat kehitaman',
            'G09' => 'Anakan berkurang atau sedikit',
            'G10' => 'Daun tua seperti bintik-bintik coklat berkas',
            'G11' => 'Daun berwarna hijau kelabu melipat',
            'G12' => 'Pada pertanaman yang telah mencapai fase tumbuh anakan sampai fase pemasakan',
            'G13' => 'Perubahan warna daun',
            'G14' => 'Tanaman tumbuh kerdil',
            'G15' => 'Warna daun tanaman sedikit menguning sampai jingga',
            'G16' => 'Tanaman kerdil',
            'G17' => 'Bercak-bercak berwarna coklat',
            'G18' => 'Anakan bertambah banyak',
            'G19' => 'Daun pendek dan sempit',
            'G20' => 'Daun berwarna hijau pucat atau kekuning-kuningan',
            'G21' => 'Bercak menyerang daun',
            'G22' => 'Anakan tumbuh tegak',
        ];

        foreach ($data as $kode => $nama) {
            Gejala::updateOrCreate(
                ['kode' => $kode],
                ['nama' => $nama]
            );
        }
    }
}