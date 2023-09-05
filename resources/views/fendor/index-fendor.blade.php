@extends('layouts.admin')

@section('content')
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Vendor</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>Nama Vendor</th>
                        <td>Telp</td>
                        <td>Address</td>
                        <td>Contact Person</td>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($vendors as $vendor)
                  <tr class="text-center">
                     <td>{{$loop->iteration}}</td>
                     <td>{{$vendor->name_vendor}}</td>
                     <td>{{$vendor->telp}}</td>
                     <td>{{$vendor->address_vendor}}</td>
                     <td>{{$vendor->contact_person}}</td>
                     <td>
                      <a href="{{route('vendor.edit',['id'=>$vendor->id])}}" class="btn btn-primary">edit</a>
                      <a href="{{route('vendor.destroy',['id'=>$vendor->id])}}" class="btn btn-danger">delete</a>
                     </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            <a href="{{route('vendor.create')}}" class="btn btn-success">add</a>
        </div>
    </div>
@endsection
