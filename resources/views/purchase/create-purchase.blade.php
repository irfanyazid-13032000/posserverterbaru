@extends('layouts.admin')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Purchase</h5>
                <div class="card-body">
                    <form action="{{route('purchase.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf


                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">Warehouse</label>
                            <select name="warehouse_id" id="warehouse_id" class="form-control">
                              <option value="">pilih warehouse</option>
                              @foreach ($warehouses as $warehouse)
                              <option value="{{ $warehouse->id }}">{{ $warehouse->name_warehouse }}</option>
                              @endforeach
                            </select>
                            @error('warehouse_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_invoice" class="form-label">no invoice</label>
                            <input type="text" class="form-control" id="no_invoice" name="no_invoice" value="{{$no_invoice}}" readonly>
                            @error('no_invoice')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                    

                        <div class="mb-3">
                          <div id="bahan_dasar_purchase"></div>
                        </div>
                        


                        <div class="mb-3">
                            <label for="vendor_id" class="form-label">vendor</label>
                            <select name="vendor_id" id="vendor_id" class="form-control">
                              <option value="">pilih kategori vendor</option>
                              @foreach ($vendors as $vendor)
                              <option value="{{ $vendor->id }}">{{ $vendor->name_vendor }}</option>
                              @endforeach
                            </select>
                            @error('vendor_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('purchase.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection


@push('addon-script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  
<script>
  // $('#bahan_dasar_id').select2({})
  $('#warehouse_id').select2({})
  $('#vendor_id').select2({})

  let i = 0
  function loadTableAwalBahan() {
    var routeUrl = "{{ route('purchase.table.awal.bahan',':i') }}";
            routeUrl = routeUrl.replace(':i', i);

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                  $('#bahan_dasar_purchase').html(res)
                  $('#bahan_dasar_id' + i).select2()
                  addRowPurchase()
                  getDataWhenSelectedBahanDasar(i)

                }
            });
  }

  loadTableAwalBahan()

  function addRowPurchase(params) {
    $('#add-row').on('click',function (params) {
      ++i

      var routeUrl = "{{ route('purchase.table.tambahan.bahan',':i') }}";
            routeUrl = routeUrl.replace(':i', i);

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                  $('#table-bahan-purchase').append(res)
                  $('#bahan_dasar_id' + i).select2()
                  getDataWhenSelectedBahanDasar(i)
                  deleteRow(i)
                }
            });
      
      
      
    })
  }


  function getDataWhenSelectedBahanDasar(i) {
    $('#bahan_dasar_id' + i).on('change',function (params) {
      var routeUrl = "{{ route('purchase.data.bahan.dasar',':bahan_dasar_id') }}";
            routeUrl = routeUrl.replace(':bahan_dasar_id', $('#bahan_dasar_id' + i).val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                  console.log(res);
                  $('#harga_acuan' + i).val(res.harga_acuan)
                  $('#satuan' + i).val(res.nama_satuan)
                  $('#nama_kategori_bahan' + i).val(res.nama_kategori_bahan)
                  $('#kategori_bahan_id' + i).val(res.kategori_bahan_id)
                  cariSelisihHarga(i)
                  cariJumlahHarga(i)

                }
            });
    })
  }



  function deleteRow(i) {
    $(".delete-row").click(function() {
        var row = $(this).closest("tr");
        row.remove();
      });
  }

  function cariSelisihHarga(i) {
    $('#harga_satuan' + i).on('keyup',function (params) {
      let harga_acuan = $('#harga_acuan' + i).val()
      let harga_satuan = $('#harga_satuan' + i).val()
      $('#selisih_harga' + i).val(harga_acuan - harga_satuan)
    })
  }

  function cariJumlahHarga(i) {
    $('#qty' + i).on('keyup',function (params) {
      let qty = $('#qty' + i).val()
      let harga_satuan = $('#harga_satuan' + i).val()
      $('#jumlah_harga' + i).val(qty * harga_satuan)
    })

    $('#harga_satuan' + i).on('keyup',function (params) {
      let qty = $('#qty' + i).val()
      let harga_satuan = $('#harga_satuan' + i).val()
      $('#jumlah_harga' + i).val(qty * harga_satuan)
    })
  }



  



</script>
@endpush
