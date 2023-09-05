                    <table class="table table-bordered" id="table-output-masakan">
                                <tr>
                                    <th>bahan penyusun</th>
                                    <th>qty</th>
                                    <th>price</th>
                                    <th>satuan</th>
                                    <th>stock</th>
                                    <th>tombol</th>
                                </tr>
                                <tr>
                                    <td>
                                    <select id="bahan_dasar_id<?php echo e($i); ?>" name="penyusun[0][bahan_dasar_id]" class="form-control">
                                        <option value="">Pilih Output Bahan hasil</option>
                                        <?php $__currentLoopData = $bahan_dasars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bahan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($bahan->id); ?>"><?php echo e($bahan->nama_bahan); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    </td>
                                    <td>
                                        <input type="number" name="penyusun[<?php echo e($i); ?>][qty_bahan_penyusun]" id="qty_bahan_penyusun<?php echo e($i); ?>" class="form-control">
                                    </td>
                                    <td>
                                    <input type="number" name="penyusun[<?php echo e($i); ?>][price]" id="price<?php echo e($i); ?>" class="form-control" readonly>
                                    </td>
                                    <td>
                                    <input type="text" name="penyusun[<?php echo e($i); ?>][satuan]" id="satuan<?php echo e($i); ?>" class="form-control" readonly>
                                    </td>
                                    <td>
                                    <input type="text" name="penyusun[<?php echo e($i); ?>][stock]" id="stock<?php echo e($i); ?>" class="form-control" readonly>
                                    </td>
                                    <td><span class="btn btn-success" id="add-more">add more</span></td>
                                </tr>
                               
                        </table><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/product/table-awal-bahan-penyusun.blade.php ENDPATH**/ ?>