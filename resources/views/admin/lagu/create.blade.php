<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Lagu - Admin Terapia</title>
</head>
<body>
    <h1>Tambah Lagu Baru</h1>

    <form action="{{ route('lagu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Nama Lagu</label><br>
            <input type="text" name="nama" value="{{ old('nama') }}">
        </div>

        <div>
            <label>Genre</label><br>
            <input type="text" name="genre" value="{{ old('genre') }}">
        </div>

        <div>
            <label>File Audio</label><br>
            <input type="file" name="file">
        </div>

        <button type="submit">Simpan</button>
    </form>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('lagu.index') }}">← Kembali ke daftar lagu</a>
</body>
</html>