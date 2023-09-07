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
                                    <select name="bahan_purchase[<?php echo e($i); ?>][bahan_dasar_id]" id="bahan_dasar_id<?php echo e($i); ?>" class="form-control">
                                      <option value="">pilih bahan dasar</option>
                                      <?php $__currentLoopData = $bahan_dasars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bahan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option value="<?php echo e($bahan->id); ?>"><?php echo e($bahan->nama_bahan); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                  </td>
                                  <td><input type="text" class="form-control" id="nama_kategori_bahan<?php echo e($i); ?>" readonly></td>
                                  <td><input type="number" class="form-control" name="bahan_purchase[<?php echo e($i); ?>][harga_satuan]" id="harga_satuan<?php echo e($i); ?>"></td>
                                  <td><input type="number" class="form-control" name="bahan_purchase[<?php echo e($i); ?>][harga_acuan]" id="harga_acuan<?php echo e($i); ?>" readonly></td>
                                  <td><input type="text" class="form-control" name="bahan_purchase[<?php echo e($i); ?>][satuan]" id="satuan<?php echo e($i); ?>" readonly></td>
                                  <td><input type="number" class="form-control" name="bahan_purchase[<?php echo e($i); ?>][qty]" id="qty<?php echo e($i); ?>"></td>
                                  <td><input type="number" class="form-control" name="bahan_purchase[<?php echo e($i); ?>][jumlah_harga]" id="jumlah_harga<?php echo e($i); ?>" readonly></td>
                                  <td><input type="number" class="form-control" name="bahan_purchase[<?php echo e($i); ?>][selisih_harga]" id="selisih_harga<?php echo e($i); ?>" readonly></td>
                                  <td><span class="btn btn-success" id="add-row">add</span></td>

                                </tr>
                                
                               
                        </table>
                        <p class="mt-3">jumlah harga adalah harga satuan dikali qty</p>
                        <p>selisih harga adalah harga acuan - harga satuan</p><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/purchase/table-awal-bahan-purchase.blade.php ENDPATH**/ ?>