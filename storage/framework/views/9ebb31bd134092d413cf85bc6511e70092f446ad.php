
<?php $__env->startSection('content'); ?>
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Data Bahan Dasar</h5>
                <div class="card-body">
                    <form action="<?php echo e(route('bahan.dasar.update',['id'=>$bahan_dasar->id])); ?>" method="POST" >
                        <?php echo csrf_field(); ?>
                        
                        <div class="mb-3" id="bahan_dasar">
                            <label for="kategori_bahan_id" class="form-label">Nama kategori bahan</label>
                            <input type="text" class="form-control" id="" name="kategori_bahan_id"
                                value="<?php echo e($kategori_bahan->nama_kategori_bahan); ?>" readonly>
                            <?php $__errorArgs = ['kategori_bahan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p style="color: rgb(253, 21, 21)"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <input type="hidden" value="<?php echo e($bahan_dasar->kategori_bahan_id); ?>" name="kategori_bahan_id">


                        <div class="mb-3" id="bahan_dasar">
                            <label for="nama_bahan" class="form-label">Nama Bahan</label>
                            <input type="text" class="form-control" id="nama_bahan" name="nama_bahan"
                                value="<?php echo e($bahan_dasar->nama_bahan); ?>" required>
                            <?php $__errorArgs = ['nama_bahan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p style="color: rgb(253, 21, 21)"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>


                        <div class="mb-3">
                            <label for="satuan_id" class="form-label">Satuan</label>
                            <select name="satuan_id" id="satuan_id" class="form-control" readonly>
                                <option value="">pilih satuan</option>
                                <?php $__currentLoopData = $satuans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $satuan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($satuan->id == $bahan_dasar->satuan_id): ?>
                                <option value="<?php echo e($satuan->id); ?>"selected><?php echo e($satuan->nama_satuan); ?></option>
                                <?php else: ?>
                                <option value="<?php echo e($satuan->id); ?>"><?php echo e($satuan->nama_satuan); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['satuan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p style="color: rgb(253, 21, 21)"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3" id="bahan_dasar">
                            <label for="harga_acuan" class="form-label">Harga Acuan</label>
                            <input type="text" class="form-control" id="harga_acuan" name="harga_acuan"
                                value="<?php echo e($bahan_dasar->harga_acuan); ?>" required>
                            <?php $__errorArgs = ['harga_acuan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p style="color: rgb(253, 21, 21)"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="<?php echo e(route('bahan.dasar.index')); ?>" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('addon-script'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  

<script>
    $('#satuan_id').select2({})
    $('#kategori_bahan_id').select2({})



    $('#kategori_bahan_id').on('change',function (params) {
        renderOption()
    })




    function renderOption() {
        var routeUrl = "<?php echo e(route('bahan.dasar.option', ':id_kategori')); ?>";
            routeUrl = routeUrl.replace(':id_kategori', $('#kategori_bahan_id').val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                    $('#bahan_dasar').html('')
                    $('#bahan_dasar').html(res)
                }
            });
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/bahan_dasar/edit-bahan-dasar.blade.php ENDPATH**/ ?>