
<?php $__env->startSection('content'); ?>
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Add Stock Produk</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>Code</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stock Display</th>
                        <th>Gambar</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  <tr class="text-center">
                     <td><?php echo e($product->code_product); ?></td>
                     <td><?php echo e($product->name_product); ?></td>
                     <td>Rp. <?php echo e(number_format($product->price)); ?></td>
                     <td><?php echo e($product->stock_product); ?></td>
                     <td><img src="<?php echo e(asset('storage/product_images')); ?>/<?php echo e($product->image); ?>" alt="" width="50"></td>
                  </tr>
                </tbody>
            </table>

            <form action="<?php echo e(route('add.stock.product.reducing.warehouse.stock')); ?>" method="post" id="add-stock-product-form">
              <?php echo csrf_field(); ?>
              <select id="warehouse_id" name="warehouse_id" class="form-control mb-3 mt-3">
                  <option value="">Pilih Warehouse</option>
                  <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($warehouse->id); ?>"><?php echo e($warehouse->name_warehouse); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
    
    
              <div id="table-bahan-penyusun" class="mb-3"></div>

              <table class="table table-bordered">
              <tr>
                <td colspan="2">total price</td>
                <td><input type="number" name="total_biaya_produksi" id="total_biaya_produksi" class="form-control" readonly></td>
                <td>tombol nih</td>
              </tr>
              </table>

              <input type="number" name="update_stock" id="update_stock" class="form-control mt-3 mb-3" placeholder="add stock in display">
              <input type="number" name="update_price" id="update_price" class="form-control" placeholder="update price in display">

              <input type="hidden" value="<?php echo e($product->id); ?>" name="product_id">


              <button type="submit" class="btn btn-success mt-3">submit</button>
              
          </form>

            
           
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('addon-script'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 

<script>
   var i = 0
    $('#add-more').on('click',function (params) {
      renderBahanPenyusun(i)
      ++i
    })

    $('#warehouse_id').on('change',function (params) {
      renderTableAwalBahanPenyusun(i)
     
    })

    function renderBahanPenyusun(i) {
      var routeUrl = `<?php echo e(route('product.bahan.penyusun',[':i',':warehouse_id'])); ?>`;
            routeUrl = routeUrl.replace(':i', i);
            routeUrl = routeUrl.replace(':warehouse_id', $('#warehouse_id').val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(html) {
                    $('#table-output-masakan').append(html)
                    // console.log(html);

                    $('#bahan_dasar_id' + i).select2();

                    isiPriceBahanPenyusun(i)

                    

                    $('.btn-danger').click(function() {
                        var rowIndex = $(this).closest('tr').attr('id'); // Mendapatkan id baris
                        $('#' + rowIndex).remove(); // Menghapus baris
                        // alert('hapus nih')
                    });

                }
            });
    }



    function renderTableAwalBahanPenyusun(i) {
     
      var routeUrl = `<?php echo e(route('product.awal.bahan.penyusun',[':i',':warehouse_id'])); ?>`;
            routeUrl = routeUrl.replace(':i', 0);
            routeUrl = routeUrl.replace(':warehouse_id', $('#warehouse_id').val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(html) {
                    $('#table-bahan-penyusun').html(html)

                    

                    $('#bahan_dasar_id' + i).select2();

                    $('#add-more').on('click',function (params) {
                      //  alert('loh bisa')
                      ++i
                       renderBahanPenyusun(i)
                    })
                    

                    isiPriceBahanPenyusun(i)

                }
            });
    }


    function isiPriceBahanPenyusun(i){
      $('#bahan_dasar_id' + i).on('change',function (params) {
        let bahan_dasar_id = $('#bahan_dasar_id' + i).val()
        let warehouse_id = $('#warehouse_id').val()
        // $('#qty_bahan_penyusun' + i).val(1)
        

        var routeUrl = `<?php echo e(route('product.price.bahan.penyusun',[':bahan_dasar_id',':warehouse_id'])); ?>`;
            routeUrl = routeUrl.replace(':bahan_dasar_id', bahan_dasar_id);
            routeUrl = routeUrl.replace(':warehouse_id', warehouse_id);

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                    console.log(res)
                    $('#price' + i).val(res.harga_satuan)
                    $('#satuan' + i).val(res.nama_satuan)
                    $('#qty_bahan_penyusun' + i).val(1)
                    $('#stock' + i).val(res.stock - $('#qty_bahan_penyusun' + i).val())
                    qtyBahanPenyusun(res,i)
                    cariTotalBiayaProduksi()
                   
                    

                }
            });

        
        
    });
  }



  function qtyBahanPenyusun(res,i){
    $('#qty_bahan_penyusun' + i).val(1)
    $('#qty_bahan_penyusun' + i).on('keyup',function () {
      // alert('bisa gak tuh')
      $('#stock' + i).val(res.stock - $('#qty_bahan_penyusun' + i).val())
      $('#price' + i).val(res.harga_satuan * $('#qty_bahan_penyusun' + i).val())
      cariTotalBiayaProduksi()
      validasiStockWarehouse()
    })
   
  }


  // Get all input elements whose IDs match the pattern "priceX"

  function cariTotalBiayaProduksi() {
    
    var inputFields = document.querySelectorAll('input[id^="price"]');
    
    
    var totalSum = 0;
    
    // Iterate through the matched input fields
    for (var i = 0; i < inputFields.length; i++) {
    var inputValue = parseFloat(inputFields[i].value) || 0; // Use 0 if input is not a valid number
    totalSum += inputValue;
    }

      console.log("Total Sum:", totalSum);

    $("#total_biaya_produksi").val(totalSum)
  }


  function validasiStockWarehouse(){
    $('#add-stock-product-form').submit(function(event){
      var stockNumber = document.querySelectorAll('input[id^="stock"]');

      for (let j = 0; j < stockNumber.length; j++) {
        if (parseFloat(stockNumber[j].value) < 0) {
          alert('stock pada warehouse tidak cukup')
          event.preventDefault();
          break;
        }
      }
      
    })
  }

    
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/product/add-stock-product.blade.php ENDPATH**/ ?>