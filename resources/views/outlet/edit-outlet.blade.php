@extends('layouts.admin')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Data Outlet</h5>
                <div class="card-body">
                    <form action="{{route('outlet.update',['id'=>$outlet->id])}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label for="name_outlet" class="form-label">name outlet</label>
                            <input type="text" class="form-control" id="name_outlet" name="name_outlet"
                                value="{{$outlet->name_outlet}}" required>
                            @error('name_outlet')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name_item" class="form-label">Name Warehouse</label>
                            <select name="warehouse_id" id="" class="form-control">
                              @foreach ($warehouses as $warehouse)
                              @if ($warehouse->id == $outlet->warehouse_id)
                              <option value="{{$warehouse->id}}" selected>{{$warehouse->name_warehouse}}</option>
                              @else
                              <option value="{{$warehouse->id}}">{{$warehouse->name_warehouse}}</option>
                              @endif
                              @endforeach
                            </select>
                            @error('name_item')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address_outlet" class="form-label">address outlet</label>
                            <input type="text" class="form-control" id="address_outlet" name="address_outlet"
                                value="{{$outlet->address_outlet}}" required>
                            @error('address_outlet')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="contact_outlet" class="form-label">PIC</label>
                            <input type="text" class="form-control" id="contact_outlet" name="contact_outlet"
                                value="{{$outlet->contact_outlet}}" required>
                            @error('contact_outlet')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No Telp</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp"
                                value="{{$outlet->no_telp}}" required>
                            @error('no_telp')
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

