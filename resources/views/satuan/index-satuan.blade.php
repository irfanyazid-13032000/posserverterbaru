@extends('layouts.admin')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Satuan</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>nama Satuan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($satuans as $satuan)
                  <tr class="text-center">
                     <td>{{$loop->iteration}}</td>
                     <td>{{$satuan->nama_satuan}}</td>
                     <td>
                      <a href="{{route('satuan.edit',['id'=>$satuan->id])}}" class="btn btn-primary">edit</a>
                      <a href="{{route('satuan.delete',['id'=>$satuan->id])}}" class="btn btn-danger">delete</a>
                     </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            <a href="{{route('satuan.create')}}" class="btn btn-success">add</a>
        </div>
    </div>
@endsection


@push('addon-script')
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
      $('#table').DataTable({
    columnDefs: [
        {
            targets: '_all', // Kolom terakhir
            className: 'dt-center' // Membuat semua sel dalam kolom menjadi berpusat
        },
        
    ]
});

    </script>
@endpush