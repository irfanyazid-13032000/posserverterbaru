@extends('layouts.admin')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
<h4 class="fw-bold py-3 mb-4">Data Record Warehouse Stock <span class="btn btn-success">{{$warehouse->name_warehouse}}</span></h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>bahan dasar</th>
                        <th>qty</th>
                        <th>harga satuan</th>
                        <th>date</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($warehouse_records as $record)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$record->nama_bahan}}</td>
                    <td>{{$record->stock}}</td>
                    <td>Rp. {{number_format($record->harga_satuan)}}</td>
                    <td>{{$record->created_at}}</td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            
          </div>
        </div>
        
@endsection

@push('addon-script')
<script src="{{ url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>


@endpush