<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Produksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class InvoiceController extends Controller
{

    public function download($id)
    {
        $invoice = Invoice::findOrFail($id);
        $pdf = Pdf::loadView('invoice.pdf', compact('invoice'));
        return $pdf->download('invoice-' . $invoice->id . '.pdf');
    }

    public function index()
    {
        $invoices = Invoice::with('produksi')->get();
        return view('invoice.index', compact('invoices'));
    }

    public function create()
    {
        $produksi = Produksi::all();
        return view('invoice.create', compact('produksi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'production_id' => 'required|exists:produksi,id',
            'customer_name' => 'required|string|max:255',
            'quantity_sold' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'invoice_date' => 'required|date',
            'issued_by' => 'required|string|max:255',
        ]);

        Invoice::create($request->all());

        return redirect()->route('invoice.index')->with('success', 'Invoice berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $produksi = Produksi::all();
        return view('invoice.edit', compact('invoice', 'produksi'));
    }

    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);

        $request->validate([
            'production_id' => 'required|exists:produksi,id',
            'customer_name' => 'required|string|max:255',
            'quantity_sold' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'invoice_date' => 'required|date',
            'issued_by' => 'required|string|max:255',
        ]);

        $invoice->update($request->all());

        return redirect()->route('invoice.index')->with('success', 'Invoice berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('invoice.index')->with('success', 'Invoice berhasil dihapus.');
    }
}
