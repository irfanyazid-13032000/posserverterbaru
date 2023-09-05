@extends('layouts.admin')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create Food Process</h5>
                <div class="card-body">
                    <form action="{{route('food.process.update',['id_food_process'=>$food_process->id])}}" method="POST" enctype="multipart/form-data" >
                        @csrf


                        <div class="mb-3">
                            <label for="bahan_dasar_id" class="form-label">Bahan Dasar</label>
                            <select name="bahan_dasar_id" id="bahan_dasar_id" class="form-control">
                              <option value="">pilih bahan dasar</option>
                              @foreach ($bahan_dasars as $bahan_dasar)
                              @if ($food_process->bahan_dasar_id == $bahan_dasar->id)
                              <option value="{{$bahan_dasar->id}}" selected>{{$bahan_dasar->nama_bahan}}</option>
                              @else
                              <option value="{{$bahan_dasar->id}}">{{$bahan_dasar->nama_bahan}}</option>
                              @endif
                              @endforeach
                            </select>
                            @error('bahan_dasar_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="satuan_id" class="form-label">Satuan</label>
                            <select name="satuan_id" id="satuan_id" class="form-control">
                              @foreach ($satuans as $satuan)
                              @if ($food_process->satuan_id == $satuan->id)
                              <option value="{{$satuan->id}}" selected>{{$satuan->nama_satuan}}</option>
                              @else
                              <option value="{{$satuan->id}}">{{$satuan->nama_satuan}}</option>
                              @endif
                              @endforeach
                            </select>
                            @error('satuan_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="qty" class="form-label">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty"
                                value="{{$food_process->qty}}" required>
                            @error('qty')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>



                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="" class="btn btn-danger ms-3">Kembali</a>
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
  $('#satuan_id').select2({})
  $('#bahan_dasar_id').on('change',function (params) {
    getFoodData()
  })


  function getFoodData() {
    var routeUrl = "{{ route('food.data', ':index') }}";
            routeUrl = routeUrl.replace(':index', $('#bahan_dasar_id').val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                    // console.log(res.harga_satuan);
                    // $('#harga_satuan').val(res.harga_satuan)
                    // getJumlahHarga()
                }
            });
  }

//   function getJumlahHarga() {
//     $('#jumlah_harga').val($('#qty').val() * $('#harga_satuan').val())
//   }

  getFoodData()

  // getJumlahHarga()

  $('#qty').on('keyup',function (params) {
    // getJumlahHarga()
  })


</script>
@endpush
