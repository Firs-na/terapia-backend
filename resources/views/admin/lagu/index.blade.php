<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Lagu - Admin Terapia</title>
</head>
<body>
    <h1>Daftar Lagu</h1>

    <a href="{{ route('lagu.create') }}">+ Tambah Lagu</a>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Genre</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lagu as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->genre }}</td>
                    <td>{{ $item->file }}</td>
                    <td>
                        <form action="{{ route('lagu.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>