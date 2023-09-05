         <tr id="tr{{$i}}">
            <td>
                <select id="bahan_dasar_id{{$i}}" name="outputs[{{$i}}][bahan_dasar_id]" class="form-control">
                    <option value="">Pilih Output Bahan hasil</option>
                    @foreach ($bahan_dasars as $bahan)
                    <option value="{{$bahan->id}}">{{$bahan->nama_bahan}}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="number" name="outputs[{{$i}}][qty_output]" id="qty_output" class="form-control"></td>
            <td><span class="btn btn-danger">delete</span></td>
        </tr>