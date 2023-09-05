
<?php $__env->startSection('content'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<h4 class="fw-bold py-3 mb-4">Data Record Warehouse Stock <span class="btn btn-success"><?php echo e($warehouse->name_warehouse); ?></span></h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>bahan dasar</th>
                        <th>qty</th>
                        <th>harga satuan</th>
                        <th>date</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <?php $__currentLoopData = $warehouse_records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($record->nama_bahan); ?></td>
                    <td><?php echo e($record->stock); ?></td>
                    <td>Rp. <?php echo e(number_format($record->harga_satuan)); ?></td>
                    <td><?php echo e($record->created_at); ?></td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            
          </div>
        </div>
        
<?php $__env->stopSection(); ?>

<?php $__env->startPush('addon-script'); ?>
<script src="<?php echo e(url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js')); ?>"></script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/record_warehouse/index-record-warehouse.blade.php ENDPATH**/ ?>