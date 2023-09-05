@extends('layouts.admin')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Warehouse</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>Nama Warehouse</th>
                        <td>Alamat</td>
                        <td>PIC</td>
                        <td>Contact</td>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ( $warehouses as $warehouse)
                  <tr class="text-center">
                     <td>{{$loop->iteration}}</td>
                     <td>{{$warehouse->name_warehouse}}</td>
                     <td>{{$warehouse->address}}</td>
                     <td>{{$warehouse->pic}}</td>
                     <td>{{$warehouse->contact}}</td>
                     <td>
                      <a href="{{route('warehouse.edit',['id'=> $warehouse->id])}}" class="btn btn-primary">edit</a>
                      <a href="{{route('warehouse.delete',['id'=> $warehouse->id])}}" class="btn btn-danger">delete</a>
                      <a href="{{route('warehouse.stock.index',['id_warehouse'=> $warehouse->id])}}" class="btn btn-info">stock</a>
                      <a href="{{route('warehouse.record.index',['id_warehouse'=> $warehouse->id])}}" class="btn btn-warning">record</a>
                     </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            <a href="{{route('warehouse.create')}}" class="btn btn-success">add</a>
        </div>
    </div>
@endsection