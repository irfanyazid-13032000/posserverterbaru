@extends('layouts.admin')
@section('content')

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
    <style>
        .ui-datepicker-week-highlight span {
            background-color: #f0f0f0;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <h4 class="fw-bold py-3 mb-4">Data record bahan</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
    <form  method="GET">
        <div class="row mb-4">
            
            <div class="col-md-3">
                <input type="text" id="search" class="form-control" placeholder="cari data" value="{{$cari}}" name="cari">
            </div>

            <div class="col-md-3">
                <select name="proses_produksi_id" id="proses_produksi_id" class="form-control">
                    <option value="">pilih line produksi</option>
                    @foreach ($kategori_proses_produksis as $kat_proses_produksi)
                    <option value="{{$kat_proses_produksi->id}}">{{$kat_proses_produksi->nama_kategori}}</option>
                    @endforeach
                </select>
            </div>
            

            <div class="col-md-3">
                <input type="date" id="startDate" name="startDate" value="{{$date_from}}" class="form-control">
            </div>

            <div class="col-md-3">
                <input type="date" id="endDate" name="endDate" value="{{$date_to}}" class="form-control">
            </div>
              

            
            <div class="col-md-3">
                <button class="btn btn-success" type="submit">cari</button>
            </div>
        </div>
    </form>

        <div id="recordBahan">
          <table class="table table-hover" id="table">
              <thead>
                  <tr class="text-center" style="text-align:center">
                      <th>No</th>
                      <th>nama kategori produksi</th>
                      <th>menu masakan</th>
                      <th>nama Bahan dasar</th>
                      <th>qty masakan</th>
                      <th>qty bahan</th>
                      <th>price per bahan</th>
                      <th>jumlah cost per bahan</th>
                      <th>Date</th>
                  </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="table">
                @foreach ($record_bahans as $record)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$record->nama_kategori}}</td>
                  <td>{{$record->nama_menu}}</td>
                  <td>{{$record->nama_bahan}}</td>
                  <td>{{$record->qty_masakan}}</td>
                  <td>{{$record->qty_bahan}}</td>
                  <td>{{$record->price_per_bahan}}</td>
                  <td>{{$record->jumlah_cost_per_bahan}}</td>
                  <td>{{$record->created_at}}</td>
                </tr>
                @endforeach
              </tbody>
          </table>

          {{ $record_bahans->appends(['cari' => $cari, 'startDate' => $date_from, 'endDate' => $date_to])->links() }}


        </div>

        
          </div>
        </div>
        
@endsection


