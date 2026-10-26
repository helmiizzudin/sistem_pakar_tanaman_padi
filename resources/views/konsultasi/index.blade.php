
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <title>Konsultasi Penyakit Tanaman Padi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7f4;
            margin: 0;
            padding: 30px 15px;
        }
        .container {
            max-width: 760px;
            margin: auto;
            background: white;
            padding: 28px;
            border-radius: 10px;
        }
        .gejala {
            display: block;
            padding: 12px;
            border-bottom: 1px solid #eee;
        }
        .gejala input {
            margin-right: 10px;
        }
        button {
            margin-top: 24px;
            padding: 12px 24px;
            background: #27834a;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        .error { color: #b42318; }
    </style>
</head>
<body>
<div class="container">
    <h1>Konsultasi Penyakit Tanaman Padi</h1>
    <p>Pilih gejala yang ditemukan pada tanaman padi.</p>

    @if ($errors->any())
        <p class="error">
            {{ $errors->first() }}
        </p>
    @endif

    <form action="{{ route('konsultasi.diagnosis') }}"
          method="POST">
        @csrf

        @foreach ($gejala as $item)
            <label class="gejala">
                <input type="checkbox"
                       name="gejala[]"
                       value="{{ $item->kode }}"
                       {{ in_array($item->kode, old('gejala', [])) ? 'checked' : '' }}>
                {{ $item->kode }} — {{ $item->nama }}
            </label>
        @endforeach

        <button type="submit">
            Proses Diagnosis
        </button>
    </form>
</div>
</body>
</html>
