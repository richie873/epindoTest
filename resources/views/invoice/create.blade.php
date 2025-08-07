@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Buat Invoice Baru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('invoice.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="production_id">Pilih Produksi</label>
            <select name="production_id" id="production_id" class="form-control" required>
                <option value="">-- Pilih Produksi --</option>
                @foreach ($produksi as $production)
                    <option value="{{ $production->id }}">{{ $production->product_name }} (Stok: {{ $production->stock }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="customer_name">Nama Pelanggan</label>
            <input type="text" name="customer_name" id="customer_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="quantity_sold">Jumlah Terjual</label>
            <input type="number" name="quantity_sold" id="quantity_sold" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="price">Total Harga</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="invoice_date">Tanggal Invoice</label>
            <input type="date" name="invoice_date" id="invoice_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="issued_by">Dibuat Oleh</label>
            <input type="text" name="issued_by" id="issued_by" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('invoice.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
