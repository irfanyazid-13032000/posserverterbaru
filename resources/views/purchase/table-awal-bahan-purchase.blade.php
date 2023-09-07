<table class="table table-bordered" id="table-bahan-purchase">
                                <tr>
                                    <th>Nama Bahan Dasar</th>
                                    <th>kategori bahan</th>
                                    <th>harga satuan</th>
                                    <th>harga acuan</th>
                                    <th>satuan</th>
                                    <th>qty</th>
                                    <th>jumlah harga</th>
                                    <th>selisih harga</th>
                                    <th>tombol</th>
                                </tr>
                                <tr>
                                  <td>
                                    <select name="bahan_purchase[{{$i}}][bahan_dasar_id]" id="bahan_dasar_id{{$i}}" class="form-control">
                                      <option value="">pilih bahan dasar</option>
                                      @foreach ($bahan_dasars as $bahan)
                                      <option value="{{$bahan->id}}">{{$bahan->nama_bahan}}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td><input type="text" class="form-control" id="nama_kategori_bahan{{$i}}" readonly></td>
                                  <td><input type="number" class="form-control" name="bahan_purchase[{{$i}}][harga_satuan]" id="harga_satuan{{$i}}"></td>
                                  <td><input type="number" class="form-control" name="bahan_purchase[{{$i}}][harga_acuan]" id="harga_acuan{{$i}}" readonly></td>
                                  <td><input type="text" class="form-control" name="bahan_purchase[{{$i}}][satuan]" id="satuan{{$i}}" readonly></td>
                                  <td><input type="number" class="form-control" name="bahan_purchase[{{$i}}][qty]" id="qty{{$i}}"></td>
                                  <td><input type="number" class="form-control" name="bahan_purchase[{{$i}}][jumlah_harga]" id="jumlah_harga{{$i}}" readonly></td>
                                  <td><input type="number" class="form-control" name="bahan_purchase[{{$i}}][selisih_harga]" id="selisih_harga{{$i}}" readonly></td>
                                  <td><span class="btn btn-success" id="add-row">add</span></td>

                                </tr>
                                
                               
                        </table>
                        <p class="mt-3">jumlah harga adalah harga satuan dikali qty</p>
                        <p>selisih harga adalah harga acuan - harga satuan</p>