@extends('layouts.admin')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Bahan Dasar</h5>
                <div class="card-body">
                    <form action="{{route('bahan.dasar.store')}}" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="kategori_bahan_id" class="form-label">kategori bahan</label>
                            <select name="kategori_bahan_id" id="kategori_bahan_id" class="form-control">
                                <option value="">pilih kategori bahan</option>
                                @foreach ($kategori_bahans as $kategori_bahan)
                                <option value="{{$kategori_bahan->id}}">{{$kategori_bahan->nama_kategori_bahan}}</option>
                                @endforeach
                            </select>
                            @error('kategori_bahan_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3" id="bahan_dasar">
                            
                        </div>

                      


                        <div class="mb-3">
                            <label for="satuan_id" class="form-label">Satuan</label>
                            <select name="satuan_id" id="satuan_id" class="form-control">
                                <option value="">pilih satuan</option>
                                @foreach ($satuans as $satuan)
                                <option value="{{$satuan->id}}">{{$satuan->nama_satuan}}</option>
                                @endforeach
                            </select>
                            @error('satuan_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('bahan.dasar.index')}}" class="btn btn-danger ms-3">Kembali</a>
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
    $('#satuan_id').select2({})
    $('#kategori_bahan_id').select2({})



    $('#kategori_bahan_id').on('change',function (params) {
        renderOption()
    })




    function renderOption() {
        var routeUrl = "{{ route('bahan.dasar.option', ':id_kategori') }}";
            routeUrl = routeUrl.replace(':id_kategori', $('#kategori_bahan_id').val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                    $('#bahan_dasar').html(res)
                }
            });
    }
</script>
@endpush