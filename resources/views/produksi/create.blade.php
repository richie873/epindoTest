@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Produksi</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('produksi.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="incoming_id" class="form-label">Bahan</label>
                    <select name="incoming_id" class="form-select" required>
                        <option value="">-- Pilih Bahan --</option>
                        @foreach($incoming as $item)
                            <option value="{{ $item->id }}">{{ $item->material_name }} ({{ $item->quantity }} {{ $item->unit }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="produk_nama" class="form-label">Nama Produk</label>
                    <input type="text" name="produk_nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="jumlah_produksi" class="form-label">Jumlah Produksi</label>
                    <input type="number" name="jumlah_produksi" class="form-control" required min="1">
                </div>

                <div class="mb-3">
                    <label for="tanggal_produksi" class="form-label">Tanggal Produksi</label>
                    <input type="date" name="tanggal_produksi" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="diproduksi_oleh" class="form-label">Diproduksi Oleh</label>
                    <input type="text" name="diproduksi_oleh" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('produksi.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
