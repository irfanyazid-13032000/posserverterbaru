<div class="mb-3">
                            <label for="bahan_dasar_id" class="form-label">Nama Bahan Tambahan</label>
                            <select name="bahan_dasar_id" id="bahan_dasar_id" class="form-control">
                              <option value="">pilih bahan tambahan</option>
                                <?php $__currentLoopData = $bahan_tambahans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bahan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($bahan->bahan_dasar_id); ?>"><?php echo e($bahan->nama_bahan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['bahan_dasar_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p style="color: rgb(253, 21, 21)"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/bahan_tambahan_produksi/option-bahan-tambahan-produksi.blade.php ENDPATH**/ ?>