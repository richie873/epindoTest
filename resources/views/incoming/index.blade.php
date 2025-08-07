@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Data Barang Masuk</h2>
    <a href="{{ route('incoming.create') }}" class="btn btn-primary mb-3">+ Tambah Barang Masuk</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama Bahan</th>
                <th>Jenis</th>
                <th>Satuan</th>
                <th>Jumlah</th>
                <th>Tanggal Masuk</th>
                <th>Diterima Oleh</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incoming as $item)
                <tr>
                    <td>{{ $item->material_name }}</td>
                    <td>{{ $item->material_type }}</td>
                    <td>{{ $item->unit }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->received_date }}</td>
                    <td>{{ $item->received_by }}</td>
                    <td>
                        <a href="{{ route('incoming.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('incoming.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/produksi"><button class="ms-2 btn btn-success btn-xl">Produksi</button></a>
</div>
@endsection
