<script>
                              let cukup = true; // Inisialisasi cukup dengan true
                        </script>
                        <table class="table table-bordered">
                          <thead>
                                <tr>
                                  <th>no</th>
                                  <th>nama bahan</th>
                                  <th>stock in warehouse</th>
                                  <th>digunakan</th>
                                  <th>sisa</th>
                                  <th>harga satuan</th>
                                  <th>total harga per bahan</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $__currentLoopData = $food_stock_warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <tr style="<?php if($food->sisa_stock < 0): ?> background-color: rgb(234, 84, 85); color: white; <?php endif; ?>">
                                  <td><?php echo e($loop->iteration); ?></td>
                                  <td><?php echo e($food->nama_bahan); ?></td>
                                  <td><?php echo e($food->stock); ?></td>
                                  <td><?php echo e($food->total_qty_used); ?></td>
                                  <td><?php echo e($food->sisa_stock); ?></td>
                                  <th>Rp. <?php echo e(number_format($food->harga_satuan)); ?></th>
                                  <th>Rp. <?php echo e(number_format($food->harga_satuan * $food->total_qty_used)); ?></th>

                                </tr>
                               
                                
                                <?php if($food->sisa_stock < 0): ?>
                                <script>
                                  return cukup = false
                                  alert("qty stock di warehouse kurang, untuk barang <?php echo e($food->nama_bahan); ?>");
                                </script>
                                
                                <?php endif; ?>
                               
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                  <td colspan="6">total biaya produksi</td>
                                  <td>Rp. <?php echo e(number_format($total_harga_produksi)); ?></td>
                                </tr>

                            </tbody>
                            </table>

                            <p>kelengkapan bahan : <?php echo e($lengkap); ?></p>
                            <p>kecukupan bahan : <?php echo e($cukup); ?></p>

                            <input type="hidden" value="<?php echo e($lengkap); ?>" id="kelengkapanBahan">
                            <input type="hidden" value="<?php echo e($cukup); ?>" id="kecukupanBahan">

                            <input type="hidden" value="<?php echo e($total_harga_produksi); ?>" name="jumlah_cost">

                            <script>
                              let lengkap = `<?php echo e($lengkap); ?>`

                              $('#submit-button').on('click',function (event) {


                                  if ($('#kecukupanBahan').val() == 'kurang') {
                                      alert('stock tidak mencukupi')
                                      event.preventDefault()
                                  }

                                if($('#kelengkapanBahan').val() == 'kurang'){
                                    alert('stock tidak lengkap')
                                    event.preventDefault()
                                }

        });
                            </script>

                           

                    

                            
<?php /**PATH C:\laragon\www\posserverterbaru\resources\views/proses_produksi/table-stock-warehouse-purchase.blade.php ENDPATH**/ ?>