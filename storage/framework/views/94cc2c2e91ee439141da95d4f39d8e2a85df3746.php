
<?php $__env->startSection('content'); ?>
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Bahan Produksi</h5>
                <div class="card-body">
                    <form action="<?php echo e(route('bahan.dasar.store')); ?>" method="POST" >
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="kategori_bahan_id" class="form-label">kategori bahan</label>
                            <select name="kategori_bahan_id" id="kategori_bahan_id" class="form-control">
                                <option value="">pilih kategori bahan</option>
                                <?php $__currentLoopData = $kategori_bahans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori_bahan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($kategori_bahan->id); ?>"><?php echo e($kategori_bahan->nama_kategori_bahan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
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

                        <div class="mb-3" id="bahan_dasar">
                            
                        </div>


                        <div class="mb-3" id="harga_acuan">
                            <label for="harga_acuan" class="form-label">Harga Acuan</label>
                            <input type="number" name="harga_acuan" class="form-control">
                        </div>

                      


                        <div class="mb-3">
                            <label for="satuan_id" class="form-label">Satuan</label>
                            <select name="satuan_id" id="satuan_id" class="form-control">
                                <option value="">pilih satuan</option>
                                <?php $__currentLoopData = $satuans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $satuan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($satuan->id); ?>"><?php echo e($satuan->nama_satuan); ?></option>
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
                    $('#bahan_dasar').html(res)
                }
            });
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/bahan_dasar/create-bahan-dasar.blade.php ENDPATH**/ ?>