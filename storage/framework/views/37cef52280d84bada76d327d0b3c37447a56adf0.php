
<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
    <style>
        .ui-datepicker-week-highlight span {
            background-color: #f0f0f0;
        }
    </style>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <h4 class="fw-bold py-3 mb-4">Data record bahan</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
    <form  method="GET">
        <div class="row mb-4">
            
            <div class="col-md-3">
                <input type="text" id="search" class="form-control" placeholder="cari data" value="<?php echo e($cari); ?>" name="cari">
            </div>

            <div class="col-md-3">
                <select name="proses_produksi_id" id="proses_produksi_id" class="form-control">
                    <option value="">pilih line produksi</option>
                    <?php $__currentLoopData = $kategori_proses_produksis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat_proses_produksi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($kat_proses_produksi->id); ?>"><?php echo e($kat_proses_produksi->nama_kategori); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            

            <div class="col-md-3">
                <input type="date" id="startDate" name="startDate" value="<?php echo e($date_from); ?>" class="form-control">
            </div>

            <div class="col-md-3">
                <input type="date" id="endDate" name="endDate" value="<?php echo e($date_to); ?>" class="form-control">
            </div>
              

            
            <div class="col-md-3">
                <button class="btn btn-success" type="submit">cari</button>
            </div>
        </div>
    </form>

        <div id="recordBahan">
          <table class="table table-hover" id="table">
              <thead>
                  <tr class="text-center" style="text-align:center">
                      <th>No</th>
                      <th>nama kategori produksi</th>
                      <th>menu masakan</th>
                      <th>nama Bahan dasar</th>
                      <th>qty masakan</th>
                      <th>qty bahan</th>
                      <th>price per bahan</th>
                      <th>jumlah cost per bahan</th>
                      <th>Date</th>
                  </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="table">
                <?php $__currentLoopData = $record_bahans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($loop->iteration); ?></td>
                  <td><?php echo e($record->nama_kategori); ?></td>
                  <td><?php echo e($record->nama_menu); ?></td>
                  <td><?php echo e($record->nama_bahan); ?></td>
                  <td><?php echo e($record->qty_masakan); ?></td>
                  <td><?php echo e($record->qty_bahan); ?></td>
                  <td><?php echo e($record->price_per_bahan); ?></td>
                  <td><?php echo e($record->jumlah_cost_per_bahan); ?></td>
                  <td><?php echo e($record->created_at); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
          </table>

          <?php echo e($record_bahans->appends(['cari' => $cari, 'startDate' => $date_from, 'endDate' => $date_to])->links()); ?>



        </div>

        
          </div>
        </div>
        
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/record_bahan/record-bahan-pagination-sendiri.blade.php ENDPATH**/ ?>