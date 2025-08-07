<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incoming;

class IncomingController extends Controller
{
    public function index()
    {
        $incoming = Incoming::all();
        return view('incoming.index', compact('incoming'));
    }

    public function create()
    {
        return view('incoming.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'material_name' => 'required',
            'material_type' => 'required',
            'unit' => 'required',
            'quantity' => 'required|integer',
            'received_date' => 'required|date',
            'received_by' => 'required',
        ]);

        Incoming::create($request->all());

        return redirect()->route('incoming.index')->with('success', 'Data barang masuk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $incoming = Incoming::findOrFail($id);
        return view('incoming.edit', compact('incoming'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'material_name' => 'required',
            'material_type' => 'required',
            'unit' => 'required',
            'quantity' => 'required|integer',
            'received_date' => 'required|date',
            'received_by' => 'required',
        ]);

        $incoming = Incoming::findOrFail($id);
        $incoming->update($request->all());

        return redirect()->route('incoming.index')->with('success', 'Data barang masuk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $incoming = Incoming::findOrFail($id);
        $incoming->delete();

        return redirect()->route('incoming.index')->with('success', 'Data barang masuk berhasil dihapus.');
    }
}
