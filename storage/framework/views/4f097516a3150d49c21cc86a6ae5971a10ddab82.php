
<?php $__env->startSection('content'); ?>
  <h4 class="fw-bold py-3 mb-4">Data Menu Masakan </h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>Nama Makanan</th>
                        <th>Porsi</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr class="text-center">
                     <td><?php echo e($loop->iteration); ?></td>
                     <td><?php echo e($menu->nama_menu); ?></td>
                     <td><?php echo e($menu->porsi); ?></td>
                     <td>
                     <a href="<?php echo e(route('food.edit',['id'=>$menu->id])); ?>" class="btn btn-primary">edit</a>
                      <a href="<?php echo e(route('food.delete',['id'=>$menu->id])); ?>" class="btn btn-danger">delete</a>
                      <a href="<?php echo e(route('food.process',['id'=>$menu->id])); ?>" class="btn btn-info">recipe</a>
                     </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
                </tbody>
            </table>

            <!-- <button
              type="button"
              class="btn btn-success"
              data-bs-toggle="modal"
              data-bs-target="#addDataIngredient">
                Add
            </button> -->

            <a href="<?php echo e(route('food.create')); ?>" class="btn btn-success">Add</a>
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




<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/food/index-food.blade.php ENDPATH**/ ?>