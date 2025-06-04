@extends('layout.v_template4') 

@section('content')
<div class="container">
    <h2>Laporan Keuangan</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3 d-print-none">
        <a href="{{ route('laporankeuangan.create') }}" class="btn btn-primary">Tambah Data</a>
        {{-- Tombol print yang panggil fungsi printTable --}}
        <button onclick="printTable()" class="btn btn-secondary">Print</button>
    </div>

    {{-- Bungkus tabel dengan div khusus --}}
    <div id="printable-area">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Pendapatan (Rp)</th>
                    <th>Pengeluaran (Rp)</th>
                    <th>Saldo (Rp)</th>
                    <th class="d-print-none">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $saldo = 0; @endphp
                @forelse ($laporan as $index => $item)
                    @php
                        $saldo += $item->pendapatan - $item->pengeluaran;
                    @endphp
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>{{ number_format($item->pendapatan, 0, ',', '.') }}</td>
                        <td>{{ number_format($item->pengeluaran, 0, ',', '.') }}</td>
                        <td>{{ number_format($saldo, 0, ',', '.') }}</td>
                        <td class="d-print-none">
                            <a href="{{ route('laporankeuangan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('laporankeuangan.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center">Tidak ada data laporan keuangan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- CSS untuk sembunyikan aksi saat print --}}
<style>
    @media print {
        .d-print-none {
            display: none !important;
        }
        table {
            border-collapse: collapse !important;
            width: 100%;
        }
        th, td {
            border: 2px solid black !important;
            padding: 8px !important;
            text-align: left !important;
            vertical-align: middle !important;
        }
        thead th {
            background-color: #f0f0f0 !important;
        }
    }
</style>


{{-- Script untuk print hanya div tabel --}}
<script>
    function printTable() {
        const printContents = document.getElementById('printable-area').innerHTML;
        const originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload(); // reload untuk memulihkan DOM dan event listener
    }
</script>
@endsection
