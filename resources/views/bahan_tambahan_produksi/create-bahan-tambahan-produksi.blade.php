@extends('layouts.admin')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Data Penggunaan Bahan Tambahan Produksi</h5>
                <div class="card-body">
                    <form action="{{route('bahan.tambahan.produksi.store')}}" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">Nama Warehouse</label>
                            <select name="warehouse_id" id="warehouse_id" class="form-control">
                                <option value="">pilih warehouse</option>
                                @foreach ($warehouses as $warehouse)
                                <option value="{{$warehouse->id}}">{{$warehouse->name_warehouse}}</option>
                                @endforeach
                            </select>
                            @error('warehouse_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3" id="bahan-tambahan">
                            
                        </div>


                        <div class="mb-3">
                            <label for="harga_satuan" class="form-label">Harga Satuan</label>
                            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan"
                                value="" readonly>
                            @error('harga_satuan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                      


                        <div class="mb-3">
                            <label for="qty" class="form-label">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty"
                                value="{{ old('qty') }}" required>
                            @error('qty')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="qty_warehouse" class="form-label">Qty In Warehouse</label>
                            <input type="number" class="form-control" id="qty_warehouse" name="qty_warehouse"
                                value="{{ old('qty_warehouse') }}" required>
                            @error('qty_warehouse')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        


                        <div class="mb-3">
                            <label for="jumlah_harga" class="form-label">jumlah harga</label>
                            <input type="number" class="form-control" id="jumlah_harga" name="jumlah_harga"
                                value="{{ old('jumlah_harga') }}" readonly>
                            @error('jumlah_harga')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('bahan.tambahan.produksi.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@push('addon-script')
<script>
   

    


    $('#warehouse_id').on('change',function (params) {
        renderOptionBahanTambahan()
        });

        



        function renderOptionBahanTambahan(){
            var routeUrl = "{{ route('data.bahan.tambahan', ':id_warehouse') }}";
            routeUrl = routeUrl.replace(':id_warehouse', $('#warehouse_id').val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                    $('#bahan-tambahan').html(res)
                    getPriceBahanDasar()

                }
            });
        }


        function getPriceBahanDasar(){
            $('#bahan_dasar_id').on('change',function (params) {
                // alert($('#bahan_dasar_id').val())
            var routeUrl = "{{ route('harga.bahan.tambahan', [':id_warehouse',':id_bahan_dasar']) }}";
            routeUrl = routeUrl.replace(':id_warehouse', $('#warehouse_id').val());
            routeUrl = routeUrl.replace(':id_bahan_dasar', $('#bahan_dasar_id').val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                    // $('#bahan-tambahan').html(res)
                    // getPriceBahanDasar()
                    console.log(res);
                    $('#harga_satuan').val(res.harga_satuan)
                    $('#qty_warehouse').val(res.stock)
                    hitungSisaGudang(res.stock)

                }
            });
        })
        }


        function hitungSisaGudang(qtyGudang) {
            $('#qty').on('keyup',function () {
                    let harga_satuan = $('#harga_satuan').val()
                    let qty = $('#qty').val()
                    let sisaQty = qtyGudang - qty
                    $('#jumlah_harga').val(harga_satuan * qty)
                    $('#qty_warehouse').val(sisaQty)
                    if (sisaQty < 0) {
                        alert('stock tidak cukup!!!')
                    }
                })
        }


</script>
@endpush