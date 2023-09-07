@extends('layouts.admin')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Proses Produksi</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>warehouse</th>
                        <th>nama Kategori Produksi</th>
                        <th>menu masakan</th>
                        <th>qty</th>
                        <th>jumlah harga</th>
                        <th>tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($proses_produksis as $proses)
                  <tr class="text-center">
                     <td>{{$loop->iteration}}</td>
                     <td>{{$proses->name_warehouse}}</td>
                     <td>{{$proses->nama_kategori}}</td>
                     <td>{{$proses->nama_menu}}</td>
                     <td>{{$proses->qty}}</td>
                     <td>Rp. {{number_format($proses->jumlah_cost)}}</td>
                     <td>{{$proses->created_at}}</td>
                     <td>
                      <a href="{{route('proses.produksi.edit',['id'=>$proses->id])}}" class="btn btn-primary">edit</a>
                      <a href="{{route('proses.produksi.delete',['id'=>$proses->id])}}" onclick="return confirm('apakah anda yakin menghapus data ini?')" class="btn btn-danger">delete</a>
                     </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            <a href="{{route('proses.produksi.create')}}" class="btn btn-success">add</a>
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