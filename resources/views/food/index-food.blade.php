@extends('layouts.admin')
@section('content')
  <h4 class="fw-bold py-3 mb-4">Data Menu Masakan </h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>Nama Makanan</th>
                        <th>Porsi</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($menus as $menu)
                  <tr class="text-center">
                     <td>{{$loop->iteration}}</td>
                     <td>{{$menu->nama_menu}}</td>
                     <td>{{$menu->porsi}}</td>
                     <td>
                     <a href="{{route('food.edit',['id'=>$menu->id])}}" class="btn btn-primary">edit</a>
                      <a href="{{route('food.delete',['id'=>$menu->id])}}" class="btn btn-danger">delete</a>
                      <a href="{{route('food.process',['id'=>$menu->id])}}" class="btn btn-info">recipe</a>
                     </td>
                  </tr>
                  @endforeach
                
                
                </tbody>
            </table>

            <!-- <button
              type="button"
              class="btn btn-success"
              data-bs-toggle="modal"
              data-bs-target="#addDataIngredient">
                Add
            </button> -->

            <a href="{{route('food.create')}}" class="btn btn-success">Add</a>
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



