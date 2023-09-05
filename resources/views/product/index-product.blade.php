@extends('layouts.admin')
@section('content')
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Produk</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>Code</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stock</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ( $products as $product)
                  <tr class="text-center">
                     <td>{{$loop->iteration}}</td>
                     <td>{{$product->code_product}}</td>
                     <td>{{$product->name_product}}</td>
                     <td>{{$product->name_category}}</td>
                     <td>Rp. {{number_format($product->price)}}</td>
                     <td>{{$product->stock_product}}</td>
                     <td><img src="{{asset('public/product_images')}}/{{$product->image}}" alt="" width="50"></td>
                     <td>
                      <a href="{{route('product.edit',['id'=> $product->id])}}" class="btn btn-primary">edit</a>
                      <a href="{{route('product.delete',['id'=> $product->id])}}" class="btn btn-danger">delete</a>
                      <a href="{{route('product.add.stock',['id'=> $product->id])}}" class="btn btn-info">add stock</a>
                     </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            <a href="{{route('product.create')}}" class="btn btn-success">add</a>
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

