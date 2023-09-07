
<?php $__env->startSection('content'); ?>
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Data Penggunaan Bahan Tambahan Produksi</h5>
                <div class="card-body">
                    <form action="<?php echo e(route('bahan.tambahan.produksi.store')); ?>" method="POST" >
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">Nama Warehouse</label>
                            <select name="warehouse_id" id="warehouse_id" class="form-control">
                                <option value="">pilih warehouse</option>
                                <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($warehouse->id); ?>"><?php echo e($warehouse->name_warehouse); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['warehouse_id'];
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

                        <div class="mb-3" id="bahan-tambahan">
                            
                        </div>


                        <div class="mb-3">
                            <label for="harga_satuan" class="form-label">Harga Satuan</label>
                            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan"
                                value="" readonly>
                            <?php $__errorArgs = ['harga_satuan'];
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
                            <label for="qty" class="form-label">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty"
                                value="<?php echo e(old('qty')); ?>" required>
                            <?php $__errorArgs = ['qty'];
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
                            <label for="qty_warehouse" class="form-label">Qty In Warehouse</label>
                            <input type="number" class="form-control" id="qty_warehouse" name="qty_warehouse"
                                value="<?php echo e(old('qty_warehouse')); ?>" required>
                            <?php $__errorArgs = ['qty_warehouse'];
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
                            <label for="jumlah_harga" class="form-label">jumlah harga</label>
                            <input type="number" class="form-control" id="jumlah_harga" name="jumlah_harga"
                                value="<?php echo e(old('jumlah_harga')); ?>" readonly>
                            <?php $__errorArgs = ['jumlah_harga'];
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
                            <a href="<?php echo e(route('bahan.tambahan.produksi.index')); ?>" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('addon-script'); ?>
<script>
   

    


    $('#warehouse_id').on('change',function (params) {
        renderOptionBahanTambahan()
        });

        



        function renderOptionBahanTambahan(){
            var routeUrl = "<?php echo e(route('data.bahan.tambahan', ':id_warehouse')); ?>";
            routeUrl = routeUrl.replace(':id_warehouse', $('#warehouse_id').val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                    $('#bahan-tambahan').html(res)
                    getPriceBahanDasar()

                }
            });
        }


        function getPriceBahanDasar(){
            $('#bahan_dasar_id').on('change',function (params) {
                // alert($('#bahan_dasar_id').val())
            var routeUrl = "<?php echo e(route('harga.bahan.tambahan', [':id_warehouse',':id_bahan_dasar'])); ?>";
            routeUrl = routeUrl.replace(':id_warehouse', $('#warehouse_id').val());
            routeUrl = routeUrl.replace(':id_bahan_dasar', $('#bahan_dasar_id').val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                    // $('#bahan-tambahan').html(res)
                    // getPriceBahanDasar()
                    console.log(res);
                    $('#harga_satuan').val(res.harga_satuan)
                    $('#qty_warehouse').val(res.stock)
                    hitungSisaGudang(res.stock)

                }
            });
        })
        }


        function hitungSisaGudang(qtyGudang) {
            $('#qty').on('keyup',function () {
                    let harga_satuan = $('#harga_satuan').val()
                    let qty = $('#qty').val()
                    let sisaQty = qtyGudang - qty
                    $('#jumlah_harga').val(harga_satuan * qty)
                    $('#qty_warehouse').val(sisaQty)
                    if (sisaQty < 0) {
                        alert('stock tidak cukup!!!')
                    }
                })
        }


</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/bahan_tambahan_produksi/create-bahan-tambahan-produksi.blade.php ENDPATH**/ ?>