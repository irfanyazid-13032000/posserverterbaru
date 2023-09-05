@extends('layouts.admin')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create Kategori Proses Produksi</h5>
                <div class="card-body">
                    <form action="{{route('kategori.proses.produksi.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf

                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label">nama kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                                value="{{ old('nama_kategori') }}" required>
                            @error('nama_kategori')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('kategori.proses.produksi.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

