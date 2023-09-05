@extends('layouts.admin')

@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Vendor</h5>
                <div class="card-body">
                    <form action="{{route('vendor.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label for="name_vendor" class="form-label">Nama Vendor</label>
                            <input type="text" class="form-control" id="name_vendor" name="name_vendor"
                                value="{{ old('name_vendor') }}" required>
                            @error('name_vendor')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="telp" class="form-label">Telepon</label>
                            <input type="text" class="form-control" id="telp" name="telp"
                                value="{{ old('telp') }}" required>
                            @error('telp')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="address_vendor" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address_vendor" name="address_vendor"
                                value="{{ old('address_vendor') }}" required>
                            @error('address_vendor')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="contact_person" class="form-label">Contact Person</label>
                            <input type="text" class="form-control" id="contact_person" name="contact_person"
                                value="{{ old('contact_person') }}" required>
                            @error('contact_person')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                    
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('vendor.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection