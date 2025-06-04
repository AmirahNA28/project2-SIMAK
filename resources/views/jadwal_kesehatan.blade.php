<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Jadwal Kesehatan Sapi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-4">
    <h2>Jadwal Kesehatan Sapi</h2>
    <a href="{{ url('jadwal_kesehatan/create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID Jadwal</th>
                <th>Nama Sapi</th>
                <th>Tanggal Periksa</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jadwals as $jadwal)
            <tr>
                <td>{{ $jadwal->id_jadwal }}</td>
                <td>{{ $jadwal->sapi->nama_sapi }}</td>
                <td>{{ date('d-m-Y', strtotime($jadwal->tanggal_periksa)) }}</td>
                <td>{{ $jadwal->keterangan }}</td>
                <td>
                    <a href="{{ url('jadwal_kesehatan/'.$jadwal->id_jadwal.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ url('jadwal_kesehatan/'.$jadwal->id_jadwal) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin hapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Data jadwal kesehatan belum ada.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
