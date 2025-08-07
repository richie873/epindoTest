@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Barang Masuk</h2>
    <form action="{{ route('incoming.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Bahan</label>
            <input type="text" name="material_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Jenis Bahan</label>
            <input type="text" name="material_type" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Satuan</label>
            <input type="text" name="unit" class="form-control" value="kg" required>
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tanggal Masuk</label>
            <input type="date" name="received_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Diterima Oleh</label>
            <input type="text" name="received_by" class="form-control" required>
        </div>
        <button class="btn btn-success mt-2">Simpan</button>
    </form>
</div>
@endsection
