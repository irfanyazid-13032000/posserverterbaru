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
                            <input type="text" class="form-control" id="no_invoice" name="no_invoice">
                            @error('no_invoice')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>



                        <div class="mb-3">
                            <label for="bahan_dasar_id" class="form-label">nama bahan</label>
                            <select name="bahan_dasar_id" id="bahan_dasar_id" class="form-control">
                              <option value="">pilih bahan</option>
                              @foreach ($bahans as $bahan)
                              <option value="{{ $bahan->id }}">{{ $bahan->nama_bahan }}</option>
                              @endforeach
                            </select>
                            @error('bahan_dasar_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>



                        <div class="mb-3">
                            <label for="nama_kategori_bahan" class="form-label">kategori bahan</label>
                            <input type="text" class="form-control" id="nama_kategori_bahan" readonly>
                            @error('kategori_bahan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <input type="hidden" name="kategori_bahan_id" id="kategori_bahan_id">


                        <div class="mb-3">
                            <label for="nama_satuan" class="form-label">nama satuan</label>
                            <input type="text" class="form-control" id="nama_satuan" readonly>
                            @error('nama_satuan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <input type="hidden" name="satuan_id" id="satuan_id">



                        <div class="mb-3">
                            <label for="qty" class="form-label">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty"
                                value="{{ old('qty') }}" required>
                            @error('qty')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="harga_satuan" class="form-label">harga_satuan</label>
                            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan"
                                value="{{ old('harga_satuan') }}" required>
                            @error('harga_satuan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="jumlah_harga" class="form-label">jumlah_harga</label>
                            <input type="number" class="form-control" id="jumlah_harga" name="jumlah_harga"
                                value="{{ old('jumlah_harga') }}" readonly>
                            @error('jumlah_harga')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
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
                            <a href="{{route('outlet.index')}}" class="btn btn-danger ms-3">Kembali</a>
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
  $('#bahan_dasar_id').select2({})
  $('#warehouse_id').select2({})
//   $('#kategori_bahan_id').select2({})
//   $('#satuan_id').select2({})
  $('#vendor_id').select2({})
  $('#bahan_dasar_id').on('change',function (params) {
    var routeUrl = "{{ route('food.data', ':index') }}";
            routeUrl = routeUrl.replace(':index', $('#bahan_dasar_id').val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                    $('#nama_kategori_bahan').val(res.nama_kategori_bahan)
                    $('#nama_satuan').val(res.nama_satuan)
                    $('#kategori_bahan_id').val(res.kategori_bahan_id)
                    $('#satuan_id').val(res.satuan_id)
                    hitungJumlahHarga()
                }
            });
  })

  $('#qty').on('keyup',function (params) {
    hitungJumlahHarga()
  })

  $('#harga_satuan').on('keyup',function (params) {
    hitungJumlahHarga()
  })

  function hitungJumlahHarga(){
    $('#jumlah_harga').val($('#qty').val() * $('#harga_satuan').val())
  }

</script>
@endpush
