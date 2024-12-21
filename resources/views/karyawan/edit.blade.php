@extends('template.default')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h3>Ubah Data Karyawan</h3>
    </div>
    <div class="col-md-6">
        <a href="{{route('karyawan.index')}}" class="btn btn-success btn-sm float-end">
            <i class="fa fa-arrow-circle-left"></i>Kembali
        </a>

    </div>
</div>
<div class="card px-3 py-3">
    <form action="{{route('karyawan.update', $karyawan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_karyawan">Nama Karyawan</label>
            <input 
                type="text" 
                class="form-control @error('nama_karyawan') is-invalid @enderror" 
                name="nama_karyawan" 
                id="nama_karyawan" 
                value="{{ old('nama_karyawan') ?? $karyawan->nama_karyawan }}" 
                required>
            @error('nama_karyawan')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nomor_hp">Nomor Handphone</label>
            <input 
                type="text" 
                class="form-control @error('nomor_hp') is-invalid @enderror" 
                name="nomor_hp" 
                id="nomor_hp" 
                value="{{ old('nomor_hp') ?? $karyawan->nomor_hp }}" 
                required>
            @error('nomor_hp')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <input 
                type="text" 
                class="form-control @error('alamat') is-invalid @enderror" 
                name="alamat" 
                id="alamat" 
                value="{{ old('alamat') ?? $karyawan->alamat }}" 
                required>
            @error('alamat')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="col mb-3">
            <button class="btn btn-success" type="submit">
                <i class="fas fa-save"></i>
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection