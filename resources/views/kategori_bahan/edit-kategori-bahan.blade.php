@extends('layouts.admin')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Data Kategori Bahan</h5>
                <div class="card-body">
                    <form action="{{route('kategori.bahan.update',['id'=>$kategori_bahan->id])}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label for="nama_kategori_bahan" class="form-label">name Kategori bahan</label>
                            <input type="text" class="form-control" id="nama_kategori_bahan" name="nama_kategori_bahan"
                                value="{{$kategori_bahan->nama_kategori_bahan}}" required>
                            @error('nama_kategori_bahan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        
                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('outlet.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

