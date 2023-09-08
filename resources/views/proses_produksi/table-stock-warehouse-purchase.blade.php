<script>
                              let cukup = true; // Inisialisasi cukup dengan true
                        </script>
                        <table class="table table-bordered">
                          <thead>
                                <tr>
                                  <th>no</th>
                                  <th>nama bahan</th>
                                  <th>stock in warehouse</th>
                                  <th>digunakan</th>
                                  <th>sisa</th>
                                  <th>harga satuan</th>
                                  <th>total harga per bahan</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($food_stock_warehouses as $food)
                                
                                <tr style="@if ($food->sisa_stock < 0) background-color: rgb(234, 84, 85); color: white; @endif">
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$food->nama_bahan}}</td>
                                  <td>{{$food->stock}}</td>
                                  <td>{{$food->total_qty_used}}</td>
                                  <td>{{$food->sisa_stock}}</td>
                                  <th>Rp. {{number_format($food->harga_satuan)}}</th>
                                  <th>Rp. {{number_format($food->harga_satuan * $food->total_qty_used)}}</th>

                                </tr>
                               
                                
                                @if ($food->sisa_stock < 0)
                                <script>
                                  return cukup = false
                                  alert("qty stock di warehouse kurang, untuk barang {{$food->nama_bahan}}");
                                </script>
                                
                                @endif
                               
                                @endforeach

                                <tr>
                                  <td colspan="6">total biaya produksi</td>
                                  <td>Rp. {{number_format($total_harga_produksi)}}</td>
                                </tr>

                            </tbody>
                            </table>

                            <p>kelengkapan bahan : {{$lengkap}}</p>
                            <p>kecukupan bahan : {{$cukup}}</p>

                            <input type="hidden" value="{{$lengkap}}" id="kelengkapanBahan">
                            <input type="hidden" value="{{$cukup}}" id="kecukupanBahan">

                            <input type="hidden" value="{{$total_harga_produksi}}" name="jumlah_cost">

                            <script>
                              let lengkap = `{{ $lengkap }}`

                              $('#submit-button').on('click',function (event) {


                                  if ($('#kecukupanBahan').val() == 'kurang') {
                                      alert('stock tidak mencukupi')
                                      event.preventDefault()
                                  }

                                if($('#kelengkapanBahan').val() == 'kurang'){
                                    alert('stock tidak lengkap')
                                    event.preventDefault()
                                }

        });
                            </script>

                           

                    

                            
