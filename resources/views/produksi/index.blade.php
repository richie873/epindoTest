@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Produksi</h2>
    <a href="{{ url('/produksi/create') }}" class="btn btn-primary mb-3">Tambah Produksi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Material</th>
                <th>Tanggal Produksi</th>
                <th>Jumlah Digunakan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produksi as $produksi)
                <tr>
                    <td>{{ $produksi->id }}</td>
                    <td>{{ $produksi->incoming->material_name ?? '-' }}</td>
                    <td>{{ $produksi->tanggal_produksi }}</td>
                    <td>{{ $produksi->jumlah_produksi }}</td>
                    <td>
                        <a href="{{ url('/produksi/' . $produksi->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('/produksi/' . $produksi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/incoming"><button class="btn btn-primary btn-xl">Incoming</button></a>
    <a href="/invoice"><button class="ms-2 btn btn-success btn-xl">Invoice</button></a>
</div>
@endsection
