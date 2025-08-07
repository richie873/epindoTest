@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Invoice</h2>
        <a href="{{ route('invoice.create') }}" class="btn btn-primary">+ Buat Invoice</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pelanggan</th>
                <th>Jumlah Terjual</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
                <th>Petugas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->customer_name }}</td>
                    <td>{{ $invoice->quantity_sold }}</td>
                    <td>Rp {{ number_format($invoice->price, 2, ',', '.') }}</td>
                    <td>{{ $invoice->invoice_date }}</td>
                    <td>{{ $invoice->issued_by }}</td>
                    <td>
                        <a href="{{ route('invoice.download', $invoice->id) }}" class="btn btn-sm btn-success">Download PDF</a>
                        <a href="{{ route('invoice.edit', $invoice->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('invoice.destroy', $invoice->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus invoice ini?')" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">Belum ada data invoice.</td></tr>
            @endforelse
        </tbody>
    </table>
    <a href="/produksi"><button class="ms-2 btn btn-success btn-xl">Produksi</button></a>
</div>
@endsection
