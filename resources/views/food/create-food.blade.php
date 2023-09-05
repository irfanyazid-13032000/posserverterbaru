@extends('layouts.admin')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create Food</h5>
                <div class="card-body">
                    <form action="{{route('food.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf

                        <div class="mb-3">
                            <label for="nama_menu" class="form-label">nama menu</label>
                            <input type="text" class="form-control" id="nama_menu" name="nama_menu"
                                value="{{ old('nama_menu') }}" required>
                            @error('nama_menu')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="porsi" class="form-label">Porsi</label>
                            <input type="number" class="form-control" id="porsi" name="porsi"
                                value="{{ old('porsi') }}" required>
                            @error('porsi')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('food.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

