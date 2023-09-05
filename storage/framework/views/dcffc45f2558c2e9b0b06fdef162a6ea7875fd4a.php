
<?php $__env->startSection('content'); ?>
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Produk</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>Code</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stock</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr class="text-center">
                     <td><?php echo e($loop->iteration); ?></td>
                     <td><?php echo e($product->code_product); ?></td>
                     <td><?php echo e($product->name_product); ?></td>
                     <td><?php echo e($product->name_category); ?></td>
                     <td>Rp. <?php echo e(number_format($product->price)); ?></td>
                     <td><?php echo e($product->stock_product); ?></td>
                     <td><img src="<?php echo e(asset('public/product_images')); ?>/<?php echo e($product->image); ?>" alt="" width="50"></td>
                     <td>
                      <a href="<?php echo e(route('product.edit',['id'=> $product->id])); ?>" class="btn btn-primary">edit</a>
                      <a href="<?php echo e(route('product.delete',['id'=> $product->id])); ?>" class="btn btn-danger">delete</a>
                      <a href="<?php echo e(route('product.add.stock',['id'=> $product->id])); ?>" class="btn btn-info">add stock</a>
                     </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <a href="<?php echo e(route('product.create')); ?>" class="btn btn-success">add</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('addon-script'); ?>
    <script src="<?php echo e(url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js')); ?>"></script>
    <script>
      $('#table').DataTable({
    columnDefs: [
        {
            targets: '_all', // Kolom terakhir
            className: 'dt-center' // Membuat semua sel dalam kolom menjadi berpusat
        },
        
    ]
});

    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/product/index-product.blade.php ENDPATH**/ ?>