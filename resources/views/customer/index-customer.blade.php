@extends('layouts.admin')
@section('content')
  <h4 class="fw-bold py-3 mb-4">Data Customer</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>No Telp</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($customers as $customer)
                  <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$customer->name_customer}}</td>
                    <td>{{$customer->no_telp}}</td>
                    <td>
                      <a href="{{route('customer.edit',['id'=>$customer->id])}}" class="btn btn-primary">edit</a>
                      <a href="{{route('customer.destroy',['id'=>$customer->id])}}" class="btn btn-danger">delete</a>
                    </td>
                 </tr>
                  @endforeach
                 
                  
                
                
                </tbody>
            </table>


            <a href="{{route('customer.create')}}" class="btn btn-success">Add</a>
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



