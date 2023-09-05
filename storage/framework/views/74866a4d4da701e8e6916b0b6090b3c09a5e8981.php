

<?php $__env->startSection('content'); ?>
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Vendor</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>Nama Vendor</th>
                        <td>Telp</td>
                        <td>Address</td>
                        <td>Contact Person</td>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr class="text-center">
                     <td><?php echo e($loop->iteration); ?></td>
                     <td><?php echo e($vendor->name_vendor); ?></td>
                     <td><?php echo e($vendor->telp); ?></td>
                     <td><?php echo e($vendor->address_vendor); ?></td>
                     <td><?php echo e($vendor->contact_person); ?></td>
                     <td>
                      <a href="<?php echo e(route('vendor.edit',['id'=>$vendor->id])); ?>" class="btn btn-primary">edit</a>
                      <a href="<?php echo e(route('vendor.destroy',['id'=>$vendor->id])); ?>" class="btn btn-danger">delete</a>
                     </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <a href="<?php echo e(route('vendor.create')); ?>" class="btn btn-success">add</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/fendor/index-fendor.blade.php ENDPATH**/ ?>