@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Barang Masuk</h2>
    <form action="{{ route('incoming.update', $incoming->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama Bahan</label>
            <input type="text" name="material_name" class="form-control" value="{{ $incoming->material_name }}" required>
        </div>
        <div class="form-group">
            <label>Jenis Bahan</label>
            <input type="text" name="material_type" class="form-control" value="{{ $incoming->material_type }}" required>
        </div>
        <div class="form-group">
            <label>Satuan</label>
            <input type="text" name="unit" class="form-control" value="{{ $incoming->unit }}" required>
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="quantity" class="form-control" value="{{ $incoming->quantity }}" required>
        </div>
        <div class="form-group">
            <label>Tanggal Masuk</label>
            <input type="date" name="received_date" class="form-control" value="{{ $incoming->received_date }}" required>
        </div>
        <div class="form-group">
            <label>Diterima Oleh</label>
            <input type="text" name="received_by" class="form-control" value="{{ $incoming->received_by }}" required>
        </div>
        <button class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection
