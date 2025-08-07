@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Produksi</h2>

    <form action="{{ url('/produksi/' . $produksi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Material</label>
            <select name="incoming_id" class="form-control" required>
                @foreach ($incoming as $incoming)
                    <option value="{{ $incoming->id }}" {{ $incoming->id == $produksi->incoming_id ? 'selected' : '' }}>
                        {{ $incoming->material_name }} - {{ $incoming->quantity }} {{ $incoming->unit }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Tanggal Produksi</label>
            <input type="date" name="production_date" class="form-control" value="{{ $produksi->tanggal_produksi }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Jumlah Digunakan</label>
            <input type="number" name="used_quantity" class="form-control" value="{{ $produksi->jumlah_produksi }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ url('/produksi') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
