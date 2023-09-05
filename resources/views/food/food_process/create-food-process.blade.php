@extends('layouts.admin')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create Food</h5>
                <div class="card-body">
                    <form action="{{route('food.process.store',['id'=>$id])}}" method="POST" enctype="multipart/form-data" >
                        @csrf


                        <div class="mb-3">
                            <label for="bahan_dasar_id" class="form-label">Bahan Dasar</label>
                            <select name="bahan_dasar_id" id="bahan_dasar_id" class="form-control">
                              <option value="">pilih bahan dasar</option>
                              @foreach ($bahan_dasars as $bahan_dasar)
                              <option value="{{$bahan_dasar->id}}">{{$bahan_dasar->nama_bahan}}</option>
                              @endforeach
                            </select>
                            @error('bahan_dasar_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                       

                        <div class="mb-3">
                            <label for="nama_satuan" class="form-label">nama_satuan</label>
                            <input type="text" class="form-control" id="nama_satuan" name="nama_satuan"
                                value="" required>
                            @error('nama_satuan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <input type="hidden" name="satuan_id" id="satuan_id">


                        <div class="mb-3">
                            <label for="qty" class="form-label">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty"
                                value="{{ old('qty') }}" step="any" required>
                            @error('qty')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('food.process',['id'=>$id])}}" class="btn btn-danger ms-3">Kembali</a>
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
  $('#bahan_dasar_id').on('change',function (params) {
    var routeUrl = "{{ route('food.data', ':index') }}";
            routeUrl = routeUrl.replace(':index', $('#bahan_dasar_id').val());
            console.log($('#bahan_dasar_id').val())

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                    $('#nama_satuan').val(res.nama_satuan)
                    $('#satuan_id').val(res.satuan_id)
                }
            });
  })

</script>
@endpush
