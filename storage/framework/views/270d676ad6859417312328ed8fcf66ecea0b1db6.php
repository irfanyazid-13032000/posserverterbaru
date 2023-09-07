
<?php $__env->startSection('content'); ?>
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Purchase</h5>
                <div class="card-body">
                    <form action="<?php echo e(route('purchase.store')); ?>" method="POST" enctype="multipart/form-data" >
                        <?php echo csrf_field(); ?>


                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">Warehouse</label>
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

                        <div class="mb-3">
                            <label for="no_invoice" class="form-label">no invoice</label>
                            <input type="text" class="form-control" id="no_invoice" name="no_invoice" value="<?php echo e($no_invoice); ?>" readonly>
                            <?php $__errorArgs = ['no_invoice'];
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
                          <div id="bahan_dasar_purchase"></div>
                        </div>
                        


                        <div class="mb-3">
                            <label for="vendor_id" class="form-label">vendor</label>
                            <select name="vendor_id" id="vendor_id" class="form-control">
                              <option value="">pilih kategori vendor</option>
                              <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($vendor->id); ?>"><?php echo e($vendor->name_vendor); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['vendor_id'];
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
                            <a href="<?php echo e(route('purchase.index')); ?>" class="btn btn-danger ms-3">Kembali</a>
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
  // $('#bahan_dasar_id').select2({})
  $('#warehouse_id').select2({})
  $('#vendor_id').select2({})

  let i = 0
  function loadTableAwalBahan() {
    var routeUrl = "<?php echo e(route('purchase.table.awal.bahan',':i')); ?>";
            routeUrl = routeUrl.replace(':i', i);

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                  $('#bahan_dasar_purchase').html(res)
                  $('#bahan_dasar_id' + i).select2()
                  addRowPurchase()
                  getDataWhenSelectedBahanDasar(i)

                }
            });
  }

  loadTableAwalBahan()

  function addRowPurchase(params) {
    $('#add-row').on('click',function (params) {
      ++i

      var routeUrl = "<?php echo e(route('purchase.table.tambahan.bahan',':i')); ?>";
            routeUrl = routeUrl.replace(':i', i);

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                  $('#table-bahan-purchase').append(res)
                  $('#bahan_dasar_id' + i).select2()
                  getDataWhenSelectedBahanDasar(i)
                  deleteRow(i)
                }
            });
      
      
      
    })
  }


  function getDataWhenSelectedBahanDasar(i) {
    $('#bahan_dasar_id' + i).on('change',function (params) {
      var routeUrl = "<?php echo e(route('purchase.data.bahan.dasar',':bahan_dasar_id')); ?>";
            routeUrl = routeUrl.replace(':bahan_dasar_id', $('#bahan_dasar_id' + i).val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                  console.log(res);
                  $('#harga_acuan' + i).val(res.harga_acuan)
                  $('#satuan' + i).val(res.nama_satuan)
                  $('#nama_kategori_bahan' + i).val(res.nama_kategori_bahan)
                  $('#kategori_bahan_id' + i).val(res.kategori_bahan_id)
                  cariSelisihHarga(i)
                  cariJumlahHarga(i)

                }
            });
    })
  }



  function deleteRow(i) {
    $(".delete-row").click(function() {
        var row = $(this).closest("tr");
        row.remove();
      });
  }

  function cariSelisihHarga(i) {
    $('#harga_satuan' + i).on('keyup',function (params) {
      let harga_acuan = $('#harga_acuan' + i).val()
      let harga_satuan = $('#harga_satuan' + i).val()
      $('#selisih_harga' + i).val(harga_acuan - harga_satuan)
    })
  }

  function cariJumlahHarga(i) {
    $('#qty' + i).on('keyup',function (params) {
      let qty = $('#qty' + i).val()
      let harga_satuan = $('#harga_satuan' + i).val()
      $('#jumlah_harga' + i).val(qty * harga_satuan)
    })

    $('#harga_satuan' + i).on('keyup',function (params) {
      let qty = $('#qty' + i).val()
      let harga_satuan = $('#harga_satuan' + i).val()
      $('#jumlah_harga' + i).val(qty * harga_satuan)
    })
  }



  



</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/purchase/create-purchase.blade.php ENDPATH**/ ?>