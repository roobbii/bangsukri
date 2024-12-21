<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Karyawan;
use App\Models\Pemasok;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang_masuks = BarangMasuk::with('pemasok')->with('karyawan')->get();
       return view('barang_masuk.index',[
        "title" => "Barang Masuk",
        "barang_masuks" => $barang_masuks,
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Karyawan::all();
        $pemasoks = Pemasok::all();
        return view('barang_masuk.create', [
            "title" => "Barang Masuk",
            "karyawans" => $karyawans,
            "pemasoks" => $pemasoks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'sumber_dana' => 'required',
            'pemasok_id' => 'required',
            'karyawan_id' => 'required',
        ]);

        BarangMasuk::create($validatedData);
        return redirect('/barang_masuk')->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangMasuk $barangMasuk)
    {
        //
    }
}
