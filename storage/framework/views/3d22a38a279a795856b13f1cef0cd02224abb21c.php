                        <label for="nama_bahan" class="form-label">Nama bahan</label>
                            <select name="nama_bahan" id="nama_bahan" class="form-control">
                              <option value="">pilih nama bahan</option>
                              <?php $__currentLoopData = $bahans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bahan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($bahan->nama_bahan); ?>"><?php echo e($bahan->nama_bahan); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['nama_bahan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p style="color: rgb(253, 21, 21)"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/bahan_dasar/option-bahan-dasar-by-kategori.blade.php ENDPATH**/ ?>