@extends('layouts.admin')
@section('content')
  <h4 class="fw-bold py-3 mb-4">Data Pemakaian Bahan Tambahan Produksi</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>Warehouse</th>
                        <th>bahan tambahan produksi</th>
                        <th>qty</th>
                        <th>harga satuan</th>
                        <th>jumlah harga</th>
                        <th>Tanggal Pemakaian</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($bahan_tambahan_produksis as $bahan)
                  <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$bahan->name_warehouse}}</td>
                    <td>{{$bahan->nama_bahan}}</td>
                    <td>{{$bahan->qty}}</td>
                    <td>Rp. {{number_format($bahan->harga_satuan)}}</td>
                    <td>Rp. {{number_format($bahan->jumlah_harga)}}</td>
                    <td>{{$bahan->created_at}}</td>
                    <td>
                    <a href="{{route('bahan.tambahan.produksi.edit',['id'=>$bahan->id])}}" class="btn btn-primary">edit</a>
                    <a href="{{route('bahan.tambahan.produksi.delete',['id'=>$bahan->id])}}" class="btn btn-danger">delete</a>
                    </td>
                 </tr>
                  @endforeach
                
                
                </tbody>
            </table>


            <a href="{{route('bahan.tambahan.produksi.create')}}" class="btn btn-success">Add</a>
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



