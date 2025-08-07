<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $invoice->id }}</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 8px; border: 1px solid #000; }
    </style>
</head>
<body>
    <h2>INVOICE #{{ $invoice->id }}</h2>
    <p><strong>Tanggal:</strong> {{ $invoice->invoice_date }}</p>
    <p><strong>Customer:</strong> {{ $invoice->customer_name }}</p>
    <p><strong>Petugas:</strong> {{ $invoice->issued_by }}</p>

    <table>
        <thead>
            <tr>
                <th>Produksi ID</th>
                <th>Jumlah Terjual</th>
                <th>Harga Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $invoice->production_id }}</td>
                <td>{{ $invoice->quantity_sold }}</td>
                <td>Rp {{ number_format($invoice->price, 2, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
