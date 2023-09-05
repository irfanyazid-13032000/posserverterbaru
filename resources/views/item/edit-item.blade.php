@extends('layouts.admin')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Data Item</h5>
                <div class="card-body">
                    <form action="{{route('item.update',['id'=>$item->id])}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label for="code_item" class="form-label">Code Item</label>
                            <input type="text" class="form-control" id="code_item" name="code_item"
                                value="{{ $item->code_item }}" required>
                            @error('code_item')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name_item" class="form-label">Name item</label>
                            <input type="text" class="form-control" id="name_item" name="name_item"
                                value="{{ $item->name_item }}" required>
                            @error('name_item')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('item.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

