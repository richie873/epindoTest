<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body { font-family: sans-serif; }
        .header { font-size: 24px; margin-bottom: 10px; }
        .content { font-size: 16px; }
    </style>
</head>
<body>
    <div class="header">Invoice #{{ $invoice->id }}</div>
    <div class="content">
        <p><strong>Nama Pelanggan:</strong> {{ $invoice->customer_name }}</p>
        <p><strong>Tanggal:</strong> {{ $invoice->invoice_date }}</p>
        <p><strong>Total:</strong> Rp{{ number_format($invoice->price, 0, ',', '.') }}</p>
    </div>
</body>
</html>
