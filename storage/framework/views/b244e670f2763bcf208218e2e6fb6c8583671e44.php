
<?php $__env->startSection('content'); ?>
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Proses Produksi</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>warehouse</th>
                        <th>nama Kategori Produksi</th>
                        <th>menu masakan</th>
                        <th>qty</th>
                        <th>jumlah harga</th>
                        <th>tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  <?php $__currentLoopData = $proses_produksis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr class="text-center">
                     <td><?php echo e($loop->iteration); ?></td>
                     <td><?php echo e($proses->name_warehouse); ?></td>
                     <td><?php echo e($proses->nama_kategori); ?></td>
                     <td><?php echo e($proses->nama_menu); ?></td>
                     <td><?php echo e($proses->qty); ?></td>
                     <td>Rp. <?php echo e(number_format($proses->jumlah_cost)); ?></td>
                     <td><?php echo e($proses->created_at); ?></td>
                     <td>
                      <a href="<?php echo e(route('proses.produksi.edit',['id'=>$proses->id])); ?>" class="btn btn-primary">edit</a>
                      <a href="<?php echo e(route('proses.produksi.delete',['id'=>$proses->id])); ?>" onclick="return confirm('apakah anda yakin menghapus data ini?')" class="btn btn-danger">delete</a>
                     </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <a href="<?php echo e(route('proses.produksi.create')); ?>" class="btn btn-success">add</a>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/proses_produksi/index-proses-produksi.blade.php ENDPATH**/ ?>