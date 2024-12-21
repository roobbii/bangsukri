<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', [
            "title" => "Barang",
            "barangs" => $barangs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create', [
            "title" => "barang",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|min:3|max:255',
            'merk' => 'required|min:11|max:255|unique:karyawan',
            'tipe' => 'required|min:3|max:255',
            'satuan' => 'required|min:3|max:255',
        ]);

        Barang::create($validatedData);
        return redirect('/barang')->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', [
            "title" => "Barang",
            "barang" => $barang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required|min:3|max:255',
            'merk' => 'required|min:11|max:255|unique:barang,nomor_hp,' . $barang->id,
            'tipe' => 'required|min:3|max:255',
            'satuan' => 'required|min:3|max:255',
        ]);

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'merk' => $request->merk,
            'tipe' => $request->tipe,
            'satuan' => $request->satuan,
        ]);
        return redirect('/karyawan')->with('success', 'Berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        Barang::destroy($barang->id);
        return redirect('/barang')->with('success', 'Berhasil hapus data');
    }
}
