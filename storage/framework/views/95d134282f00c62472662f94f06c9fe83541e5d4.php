
<?php $__env->startSection('content'); ?>
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Kategori Bahan</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>nama Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  <?php $__currentLoopData = $kategori_bahans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bahan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr class="text-center">
                     <td><?php echo e($loop->iteration); ?></td>
                     <td><?php echo e($bahan->nama_kategori_bahan); ?></td>
                     <td>
                      <a href="<?php echo e(route('kategori.bahan.edit',['id'=>$bahan->id])); ?>" class="btn btn-primary">edit</a>
                      <a href="<?php echo e(route('kategori.bahan.delete',['id'=>$bahan->id])); ?>" class="btn btn-danger">delete</a>
                      <a href="<?php echo e(route('bahan.baku.kategori.bahan.index',['id'=>$bahan->id])); ?>" class="btn btn-info">bahan</a>
                     </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <a href="<?php echo e(route('kategori.bahan.create')); ?>" class="btn btn-success">add</a>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/kategori_bahan/index-kategori-bahan.blade.php ENDPATH**/ ?>