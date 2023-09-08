@extends('layouts.admin')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Customer</h5>
                <div class="card-body">
                    <form action="{{route('customer.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        
                        
                       
                        <div class="mb-3">
                            <label for="name_customer" class="form-label">name_customer</label>
                            <input type="text" class="form-control" id="name_customer" name="name_customer"
                                value="">
                            @error('name_customer')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="no_telp" class="form-label">no_telp</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp"
                                value="">
                            @error('no_telp')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('category.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection


