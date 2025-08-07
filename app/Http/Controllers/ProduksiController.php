<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produksi;
use App\Models\Incoming;

class ProduksiController extends Controller
{
    public function index()
    {
        $produksi = Produksi::with('incoming')->get();
        return view('produksi.index', compact('produksi'));
    }

    public function create()
    {
        $incoming = Incoming::all();
        return view('produksi.create', compact('incoming'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'incoming_id' => 'required|exists:incoming,id',
            'produk_nama' => 'required|string',
            'jumlah_produksi' => 'required|integer|min:1',
            'tanggal_produksi' => 'required|date',
            'diproduksi_oleh' => 'required|string',
        ]);

        $incoming = Incoming::findOrFail($request->incoming_id);

        // Cek apakah stok mencukupi
        if ($request->jumlah_produksi > $incoming->quantity) {
            return back()->with('error', 'Jumlah produksi melebihi stok bahan.');
        }

        // Kurangi jumlah bahan di tabel incoming
        $incoming->quantity -= $request->jumlah_produksi;
        $incoming->save();

        // Simpan data ke tabel produksi
        Produksi::create([
            'incoming_id' => $request->incoming_id,
            'produk_nama' => $request->produk_nama,
            'jumlah_produksi' => $request->jumlah_produksi,
            'tanggal_produksi' => $request->tanggal_produksi,
            'diproduksi_oleh' => $request->diproduksi_oleh,
        ]);

        return redirect()->route('produksi.index')->with('success', 'Data produksi berhasil disimpan.');
    }

    public function edit($id)
    {
        $produksi = Produksi::findOrFail($id);
        $incoming = Incoming::all();
        return view('produksi.edit', compact('produksi', 'incoming'));
    }

    public function update(Request $request, $id)
    {
        $produksi = Produksi::findOrFail($id);

        $produksi->update($request->all());

        return redirect()->route('produksi.index')->with('success', 'Data produksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $produksi = Produksi::findOrFail($id);
        $produksi->delete();

        return redirect()->route('produksi.index')->with('success', 'Data produksi berhasil dihapus.');
    }
}
