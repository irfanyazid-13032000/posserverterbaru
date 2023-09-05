         <tr id="tr<?php echo e($i); ?>">
            <td>
                <select id="bahan_dasar_id<?php echo e($i); ?>" name="outputs[<?php echo e($i); ?>][bahan_dasar_id]" class="form-control">
                    <option value="">Pilih Output Bahan hasil</option>
                    <?php $__currentLoopData = $bahan_dasars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bahan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($bahan->id); ?>"><?php echo e($bahan->nama_bahan); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </td>
            <td><input type="number" name="outputs[<?php echo e($i); ?>][qty_output]" id="qty_output" class="form-control"></td>
            <td><span class="btn btn-danger">delete</span></td>
        </tr><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/proses_produksi/table-output-masakan.blade.php ENDPATH**/ ?>