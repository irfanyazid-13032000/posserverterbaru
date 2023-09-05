
<?php $__env->startSection('content'); ?>
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Produk</h5>
                <div class="card-body">
                    <form action="<?php echo e(route('product.store')); ?>" method="POST" enctype="multipart/form-data" id="product_store" >
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="code_product" class="form-label">Code Product</label>
                            <select class="form-select" id="code_product" name="code_product"
                                value="<?php echo e(old('code_product')); ?>" onchange="lakukan(this)" required>
                                <option value="">Choose Code Product</option>
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->code_item); ?>"><?php echo e($item->code_item); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div id="generatedTableContainer" class="mt-4"></div>
                          
                        </div>
                        <div class="mb-3">
                            <label for="name_product" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name_product" name="name_product"
                                 readonly>
                           
                        </div>
                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">warehouse</label>
                            <select class="form-select" id="warehouse_id" name="warehouse_id"
                                value="<?php echo e(old('name_warehouse')); ?>" required>
                                <option value="">pilih warehouse</option>
                                <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($warehouse->id); ?>"><?php echo e($warehouse->name_warehouse); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['warehouse_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p style="color: rgb(253, 21, 21)"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">category</label>
                            <select class="form-select" id="category_id" name="category_id"
                                value="<?php echo e(old('name_warehouse')); ?>" required>
                                <option value="">pilih kategori</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name_category); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p style="color: rgb(253, 21, 21)"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Sale Price</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="<?php echo e(old('price')); ?>" required>
                            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p style="color: rgb(253, 21, 21)"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label for="stock_product" class="form-label">Stock Product</label>
                            <input type="number" class="form-control" id="stock_product" name="stock_product"
                                value="<?php echo e(old('stock_product')); ?>" required>
                            <?php $__errorArgs = ['stock_product'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p style="color: rgb(253, 21, 21)"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label for="product_image" class="form-label">Gambar Produk</label>
                            <input type="file" class="form-control" id="product_image" name="product_image">
                            <img src="" id="img-view" width="50">
                            <?php $__errorArgs = ['product_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p style="color: rgb(253, 21, 21)"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="<?php echo e(route('product.index')); ?>" class="btn btn-danger ms-3">Kembali</a>
                        </div>

                        <div id="generatedTableContainer" class="mt-4"></div>

                    </form>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('addon-script'); ?>
<script>
    $('#product_image').change(function(){
        previewImage(this)
    })

    function previewImage(input){
        if (input.files && input.files[0]){
            var reader = new FileReader();

            reader.onload = function (e) { // Menghapus tanda kurung ()
                console.log(e.target.result)
                $('#img-view').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0]) // Menggunakan readAsDataURL
        }
    }


    function lakukan(selectedCode) {
        let urlRoute = `<?php echo e(route('ingredient.data', ['code' => ':code'])); ?>`
        let url = urlRoute.replace(':code',selectedCode.value)
        if (selectedCode.value !== '') {
            $.ajax({
                url: url,
                method: "GET",
                success: function (data) {
                    // console.log(data)
                    // return
                    // generateTable(selectedCode, data.ingredients,data.total_price);
                    document.getElementById("name_product").value = data.item.name_item;
                    validasiUang(data.total_price)
                    
                },
                error: function (error) {
                    console.error("AJAX request failed:", error);
                }
            });
        }else{
            const tableContainer = document.getElementById("generatedTableContainer");
            tableContainer.innerHTML = ''
        }
        }

        function formatNumberToCurrency(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function generateTable(selectedCode, data,total_price) {
            // console.log(data);
            // return
            const tableContainer = document.getElementById("generatedTableContainer");
            tableContainer.innerHTML = ''
            tableContainer.innerHTML = `
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Code Ingredient</th>
                            <th>Name Ingredient</th>
                            <th>Price / Unit</th>
                            <th>Qty</th>
                            <th>Unit</th>
                            <th>Total Price/Ingredient</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${data.map(item => `
                            <tr>
                                <td>${item.code_ingredient}</td>
                                <td>${item.name_ingredient}</td>
                                <td>Rp. ${formatNumberToCurrency(item.price_per_unit)}</td>
                                <td>${item.qty}</td>
                                <td>${item.unit}</td>
                                <td>Rp. ${formatNumberToCurrency(item.total_price)}</td>
                            </tr>
                        `).join("")}
                        <tr>
                            <td colspan="5">Capital Price</td>
                            <td>Rp. ${formatNumberToCurrency(total_price)}</td>
                        </tr>
                    </tbody>
                </table>
            `;
        }







        function validasiUang(capitalPrice) {
            document.getElementById("product_store").addEventListener("submit", function(event) {
            
            // sale price harus lebih besar dari capital price
            // harga jual harus lebih besar dari harga modal

            if ($('#price').val()<=capitalPrice) {
                
                
                event.preventDefault();
                
                
                alert('harga jual tidak boleh lebih kecil dari harga modal');
                
            }
    
            })
        }





</script>



<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/product/create-product.blade.php ENDPATH**/ ?>