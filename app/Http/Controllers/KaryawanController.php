<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
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
        return view('karyawan.create', [
            "title" => "Karyawan",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_karyawan' => 'required|min:3|max:255',
            'nomor_hp' => 'required|min:11|max:255|unique:karyawan',
            'alamat' => 'required|min:3|max:255',
        ]);

        Karyawan::create($validatedData);
        return redirect('/karyawan')->with('success', 'Berhasil tambah data');


    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', [
            "title" => "Karyawan",
            "karyawan" => $karyawan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama_karyawan' => 'required|min:3|max:255',
            'nomor_hp' => 'required|min:11|max:255|unique:karyawan,nomor_hp,' . $karyawan->id,
            'alamat' => 'required|min:3|max:255',
        ]);

        $karyawan->update([
            'nama_karyawan' => $request->nama_karyawan,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
        ]);
        return redirect('/karyawan')->with('success', 'Berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        Karyawan::destroy($karyawan->id);
        return redirect('/karyawan')->with('success', 'Berhasil hapus data');
    }
}
