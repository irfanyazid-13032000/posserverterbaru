<div class="mb-3">
                            <label for="bahan_dasar_id" class="form-label">Nama Bahan Tambahan</label>
                            <select name="bahan_dasar_id" id="bahan_dasar_id" class="form-control">
                              <option value="">pilih bahan tambahan</option>
                                @foreach ($bahan_tambahans as $bahan)
                                <option value="{{$bahan->bahan_dasar_id}}">{{$bahan->nama_bahan}}</option>
                                @endforeach
                            </select>
                            @error('bahan_dasar_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>