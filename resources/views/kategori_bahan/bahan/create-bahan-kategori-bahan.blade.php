@extends('layouts.admin')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Bahan Kategori Bahan</h5>
                <div class="card-body">
                    <form action="{{route('bahan.baku.kategori.bahan.store',['id'=>$kategori_bahan->id])}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label for="nama_bahan" class="form-label">kategoori bahan</label>
                            <input type="text" class="form-control" id="nama_bahan" name="nama_bahan"
                                value="{{ $kategori_bahan->nama_kategori_bahan }}" readonly>
                            @error('nama_bahan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <input type="hidden" name="kategori_bahan_id" value="{{$kategori_bahan->id}}">

                        <div class="mb-3">
                            <label for="nama_bahan" class="form-label">Nama  Bahan</label>
                            <input type="text" class="form-control" id="nama_bahan" name="nama_bahan"
                                value="{{ old('nama_bahan') }}" required>
                            @error('nama_bahan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('kategori.bahan.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
