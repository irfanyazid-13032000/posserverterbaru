@extends('layouts.admin')
@section('content')
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Purchase</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>Warehouse</th>
                        <th>Invoice</th>
                        <th>Tgl Pembelian</th>
                        <th>Kategori Bahan</th>
                        <th>Nama Bahan</th>
                        <th>Satuan</th>
                        <th>Qty</th>
                        <th>harga satuan</th>
                        <th>jumlah harga</th>
                        <th>nama vendor</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($purchases as $purchase)
                  <tr class="text-center">
                     <td>{{$loop->iteration}}</td>
                     <td>{{$purchase->name_warehouse}}</td>
                     <td>{{$purchase->no_invoice}}</td>
                     <td>{{$purchase->created_at}}</td>
                     <td>{{$purchase->nama_kategori_bahan}}</td>
                     <td>{{$purchase->nama_bahan}}</td>
                     <td>{{$purchase->nama_satuan}}</td>
                     <td>{{$purchase->qty}}</td>
                     <td>Rp. {{number_format($purchase->harga_satuan)}}</td>
                     <td>Rp. {{number_format($purchase->jumlah_harga)}}</td>
                     <td>{{$purchase->name_vendor}}</td>
                     <td>
                     <a href="{{route('purchase.edit',['id'=>$purchase->id])}}" class="btn btn-primary">edit</a>
                      <a href="{{route('purchase.delete',['id'=>$purchase->id])}}" class="btn btn-danger">delete</a>
                     </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            <a href="{{route('purchase.create')}}" class="btn btn-success">add</a>
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

