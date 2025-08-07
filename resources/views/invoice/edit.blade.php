@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Invoice</h2>
    <form action="{{ route('invoice.update', $invoice->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Customer</label>
            <input type="text" name="customer_name" class="form-control" value="{{ $invoice->customer_name }}" required>
        </div>

        <div class="form-group">
            <label>Jumlah Terjual</label>
            <input type="number" name="quantity_sold" class="form-control" value="{{ $invoice->quantity_sold }}" required>
        </div>

        <div class="form-group">
            <label>Harga Total</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ $invoice->price }}" required>
        </div>

        <div class="form-group">
            <label>Tanggal Invoice</label>
            <input type="date" name="invoice_date" class="form-control" value="{{ $invoice->invoice_date }}" required>
        </div>

        <div class="form-group">
            <label>Nama Petugas</label>
            <input type="text" name="issued_by" class="form-control" value="{{ $invoice->issued_by }}" required>
        </div>

        <div class="form-group">
            <label>Produksi ID</label>
            <select name="production_id" class="form-control">
                @foreach($produksi as $production)
                    <option value="{{ $production->id }}" {{ $production->id == $invoice->production_id ? 'selected' : '' }}>
                        {{ $production->id }} - {{ $production->product_name ?? 'Produksi' }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Invoice</button>
        <a href="{{ route('invoice.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
