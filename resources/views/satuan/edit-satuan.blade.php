@extends('layouts.admin')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Data satuan</h5>
                <div class="card-body">
                    <form action="{{route('satuan.update',['id'=>$satuan->id])}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label for="nama_satuan" class="form-label">Satuan</label>
                            <input type="text" class="form-control" id="nama_satuan" name="nama_satuan"
                                value="{{$satuan->nama_satuan}}">
                            @error('nama_satuan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                       
                      
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('product.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
