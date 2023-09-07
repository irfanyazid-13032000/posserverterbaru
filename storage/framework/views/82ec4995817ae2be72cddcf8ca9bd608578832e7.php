
<?php $__env->startSection('content'); ?>
  <h4 class="fw-bold py-3 mb-4">Data Pemakaian Bahan Tambahan Produksi</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>Warehouse</th>
                        <th>bahan tambahan produksi</th>
                        <th>qty</th>
                        <th>harga satuan</th>
                        <th>jumlah harga</th>
                        <th>Tanggal Pemakaian</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  <?php $__currentLoopData = $bahan_tambahan_produksis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bahan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr class="text-center">
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($bahan->name_warehouse); ?></td>
                    <td><?php echo e($bahan->nama_bahan); ?></td>
                    <td><?php echo e($bahan->qty); ?></td>
                    <td>Rp. <?php echo e(number_format($bahan->harga_satuan)); ?></td>
                    <td>Rp. <?php echo e(number_format($bahan->jumlah_harga)); ?></td>
                    <td><?php echo e($bahan->created_at); ?></td>
                    <td>
                    <a href="<?php echo e(route('bahan.tambahan.produksi.edit',['id'=>$bahan->id])); ?>" class="btn btn-primary">edit</a>
                    <a href="<?php echo e(route('bahan.tambahan.produksi.delete',['id'=>$bahan->id])); ?>" class="btn btn-danger">delete</a>
                    </td>
                 </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
                </tbody>
            </table>


            <a href="<?php echo e(route('bahan.tambahan.produksi.create')); ?>" class="btn btn-success">Add</a>
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




<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/bahan_tambahan_produksi/index-bahan-tambahan-produksi.blade.php ENDPATH**/ ?>