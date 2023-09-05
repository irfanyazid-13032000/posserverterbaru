@extends('layouts.admin')
@section('content')
  <h4 class="fw-bold py-3 mb-4">Data Resep <span class="btn btn-success">{{$food->nama_menu}}</span></h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>bahan dasar</th>
                        <th>satuan</th>
                        <th>qty</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($foods_process as $makanan)
                  <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$makanan->nama_bahan}}</td>
                    <td>{{$makanan->nama_satuan}}</td>
                    <td>{{$makanan->qty}}</td>
                    <td>
                    <a href="{{route('food.process.edit',['id_food_process'=>$makanan->id])}}" class="btn btn-primary">edit</a>
                     <a href="{{route('food.process.delete',['id_food_process'=>$makanan->id])}}" class="btn btn-danger">delete</a>
                    </td>
                 </tr>
                    @endforeach
                  <!-- <tr>
                    <th colspan="8"></th>
                  </tr>
                  <tr>
                    <th colspan="5"></th>
                    <th style="text-align:center;">All Total Price</th>
                    <th></th>
                  </tr>
                  <tr>
                    <th colspan="5"></th>
                    <th style="text-align:center;">Rp. {{number_format($totalPrice)}}</th>
                    <th></th>
                  </tr>
                  <tr>
                    <th colspan="5"></th>
                    <th style="text-align:center;">Porsi : {{$food->porsi}}</th>
                    <th></th>
                  </tr>
                  <tr>

                    <th colspan="5"></th>
                    <th style="text-align:center;">Harga per Porsi : Rp. {{number_format($totalPrice/$food->porsi)}}</th>
                    <th></th>
                  </tr> -->
                  
                
                
                </tbody>
            </table>


            <a href="{{route('food.process.create',['id'=>$id])}}" class="btn btn-success">Add</a>
            <a href="{{route('food.index')}}" class="btn btn-danger">Back</a>
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



