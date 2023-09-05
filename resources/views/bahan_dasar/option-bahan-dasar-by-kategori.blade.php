                        <label for="nama_bahan" class="form-label">Nama bahan</label>
                            <select name="nama_bahan" id="nama_bahan" class="form-control">
                              <option value="">pilih nama bahan</option>
                              @foreach ($bahans as $bahan)
                              <option value="{{$bahan->nama_bahan}}">{{$bahan->nama_bahan}}</option>
                              @endforeach
                            </select>
                            @error('nama_bahan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror