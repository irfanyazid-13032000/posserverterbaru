                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>no</th>
                                  <th>nama bahan</th>
                                  <th>qty</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $__currentLoopData = $foods_process; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td><?php echo e($loop->iteration); ?></td>
                                  <td><?php echo e($food->nama_bahan); ?></td>
                                  <td><?php echo e($food->qty * $qty); ?></td>
                                 
                                </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            </table>

                            <?php /**PATH C:\laragon\www\posserverterbaru\resources\views/proses_produksi/table-rincian-resep.blade.php ENDPATH**/ ?>