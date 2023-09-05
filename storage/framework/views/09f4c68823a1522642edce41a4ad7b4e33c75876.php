
<?php $__env->startSection('content'); ?>
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Warehouse</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>Nama Warehouse</th>
                        <td>Alamat</td>
                        <td>PIC</td>
                        <td>Contact</td>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr class="text-center">
                     <td><?php echo e($loop->iteration); ?></td>
                     <td><?php echo e($warehouse->name_warehouse); ?></td>
                     <td><?php echo e($warehouse->address); ?></td>
                     <td><?php echo e($warehouse->pic); ?></td>
                     <td><?php echo e($warehouse->contact); ?></td>
                     <td>
                      <a href="<?php echo e(route('warehouse.edit',['id'=> $warehouse->id])); ?>" class="btn btn-primary">edit</a>
                      <a href="<?php echo e(route('warehouse.delete',['id'=> $warehouse->id])); ?>" class="btn btn-danger">delete</a>
                      <a href="<?php echo e(route('warehouse.stock.index',['id_warehouse'=> $warehouse->id])); ?>" class="btn btn-info">stock</a>
                      <a href="<?php echo e(route('warehouse.record.index',['id_warehouse'=> $warehouse->id])); ?>" class="btn btn-warning">record</a>
                     </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <a href="<?php echo e(route('warehouse.create')); ?>" class="btn btn-success">add</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/warehouse/index-warehouse.blade.php ENDPATH**/ ?>