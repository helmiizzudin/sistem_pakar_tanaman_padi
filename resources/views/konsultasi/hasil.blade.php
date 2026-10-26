
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <title>Hasil Diagnosis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7f4;
            padding: 30px 15px;
        }
        .container {
            max-width: 760px;
            margin: auto;
            background: white;
            padding: 28px;
            border-radius: 10px;
        }
        .utama {
            padding: 18px;
            background: #eaf6ed;
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        a { color: #27834a; }
    </style>
</head>
<body>
<div class="container">
    <h1>Hasil Diagnosis CBR</h1>

    @if ($diagnosisUtama && $diagnosisUtama['similarity'] > 0)
        <div class="utama">
            <h2>{{ $diagnosisUtama['nama'] }}</h2>
            <p>
                Kemiripan:
                <strong>
                    {{ number_format($diagnosisUtama['persentase'], 2) }}%
                </strong>
            </p>
            <h3>Deskripsi</h3>
            <p>{{ $diagnosisUtama['deskripsi'] }}</p>

            <h3>Penanganan</h3>
            <p>{{ $diagnosisUtama['penanganan'] }}</p>
        </div>
    @else
        <p>
            Tidak ditemukan gejala yang cocok
            dengan kasus basis penyakit.
        </p>
    @endif

    <h2>Perbandingan Kemiripan</h2>

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Penyakit</th>
                <th>Bobot</th>
                <th>Kemiripan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hasil as $item)
                <tr>
                    <td>{{ $item['kode'] }}</td>
                    <td>{{ $item['nama'] }}</td>
                    <td>
                        {{ $item['bobot_cocok'] }}
                        /
                        {{ $item['total_bobot'] }}
                    </td>
                    <td>
                        {{ number_format($item['persentase'], 2) }}%
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>
        <a href="{{ route('konsultasi.index') }}">
            Kembali ke Konsultasi
        </a>
    </p>
</div>
</body>
</html>
