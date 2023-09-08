
<?php $__env->startSection('content'); ?>
<style>
    /* Add this style to reduce or remove the bottom border of table rows */
    #table-output-masakan tr {
        border-bottom: 1px solid #dee2e6; /* You can adjust the thickness or remove it */
    }
</style>
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Proses Produksi</h5>
                <div class="card-body">
                    <form action="<?php echo e(route('proses.produksi.store')); ?>" method="POST" enctype="multipart/form-data" >
                        <?php echo csrf_field(); ?>


                        <div class="mb-3">
                            <label for="kategori_produksi_id" class="form-label">Kategori Produksi</label>
                            <select id="kategori_produksi_id" name="kategori_produksi_id" class="form-control">
                              <option value="">pilih kategori produksi</option>
                              <?php $__currentLoopData = $kategori_proses_produksis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($kategori->id); ?>"><?php echo e($kategori->nama_kategori); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['kategori_produksi_id'];
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
                            <div id="deskripsi"></div>
                        </div>


                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">warehouse</label>
                            <select id="warehouse_id" name="warehouse_id" class="form-control">
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
                            <br>
                            <div id="table-stock-warehouse"></div>
                        </div>


                        <div class="mb-3">
                            <label for="menu_masakan_id" class="form-label">menu masakan</label>
                            <select id="menu_masakan_id" name="menu_masakan_id" class="form-control">
                              <option value="">pilih menu masakan</option>
                              <?php $__currentLoopData = $menu_masakans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $masakan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($masakan->id); ?>"><?php echo e($masakan->nama_menu); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['menu_masakan_id'];
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
                            <label for="qty" class="form-label">Set Menu</label>
                            <input type="number" class="form-control" id="qty" name="qty"
                                value="1" required>
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
                            <div id="table-rincian-resep"></div>
                        </div>


                        <hr>
                        <h5>output</h4>


                        <table class="table table-bordered" id="table-output-masakan">
                                <tr>
                                    <th>bahan hasil</th>
                                    <th>qty</th>
                                    <th>tombol</th>
                                </tr>
                                <tr>
                                    <td>
                                    <select id="bahan_dasar_id" name="outputs[0][bahan_dasar_id]" class="form-control">
                                        <option value="">Pilih Output Bahan hasil</option>
                                        <?php $__currentLoopData = $bahan_dasars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bahan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($bahan->id); ?>"><?php echo e($bahan->nama_bahan); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    </td>
                                    <td>
                                        <input type="number" name="outputs[0][qty_output]" id="qty_output" class="form-control">
                                    </td>
                                    <td><span class="btn btn-success" id="add-more">add more</span></td>
                                </tr>
                        </table>


                      

                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit" id="submit-button">Simpan</button>
                            <a href="<?php echo e(route('proses.produksi.index')); ?>" class="btn btn-danger ms-3">Kembali</a>
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



    $('#kategori_produksi_id').on('change',function (params) {
        

        var routeUrl = `<?php echo e(route('deskripsi.kategori.proses.produksi',':id')); ?>`;
            routeUrl = routeUrl.replace(':id', $('#kategori_produksi_id').val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                    $('#deskripsi').html(`<p>${res.deskripsi}</p>`)
                }
            });
        
    })
    
    
    var i = 0
    $('#add-more').on('click',function (params) {
        ++i
        renderOutputMasakan(i)
    })

    function renderOutputMasakan(i){
        var routeUrl = `<?php echo e(route('proses.produksi.output.masakan',':i')); ?>`;
            routeUrl = routeUrl.replace(':i', i);

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(html) {
                    $('#table-output-masakan').append(html)
                    console.log(html);

                    $('#bahan_dasar_id' + i).select2();

                    $('.btn-danger').click(function() {
                        var rowIndex = $(this).closest('tr').attr('id'); // Mendapatkan id baris
                        $('#' + rowIndex).remove(); // Menghapus baris
                    });

                }
            });
    }


    $('#bahan_dasar_id').select2({})

    
  $('#menu_masakan_id').on('change',function () {
           tableRecipe()
           tableStockWarehouse()
        });

    $('#warehouse_id').on('change',function (params) {
        tableRecipe()
        tableStockWarehouse()
    })



        function tableRecipe() {
          var routeUrl = "<?php echo e(route('proses.produksi.rincian.resep', [':id',':qty'])); ?>";
            routeUrl = routeUrl.replace(':id', $('#menu_masakan_id').val());
            routeUrl = routeUrl.replace(':qty', $('#qty').val());
            // routeUrl = routeUrl.replace(':warehouse_id', $('#warehouse_id').val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(html) {
                  $('#table-rincian-resep').html('')
                    $('#table-rincian-resep').html(html)
                }
            });
        }





        function tableStockWarehouse() {
            var routeUrl = "<?php echo e(route('proses.produksi.stock.purchase.warehouse', [':id',':qty',':warehouse_id'])); ?>";
            routeUrl = routeUrl.replace(':id', $('#menu_masakan_id').val());
            routeUrl = routeUrl.replace(':qty', $('#qty').val());
            routeUrl = routeUrl.replace(':warehouse_id', $('#warehouse_id').val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(html) {
                  $('#table-stock-warehouse').html('')
                    $('#table-stock-warehouse').html(html)
                }
            });

        }


        $('#qty').on('keyup',function (params) {
          tableRecipe()
          tableStockWarehouse()
        })


       
    


</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/proses_produksi/create-proses-produksi.blade.php ENDPATH**/ ?>