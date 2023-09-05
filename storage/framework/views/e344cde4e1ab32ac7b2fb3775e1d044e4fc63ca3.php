
<?php $__env->startSection('content'); ?>
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Data Produk</h5>
                <div class="card-body">
                    <form action="<?php echo e(route('product.update',['id'=>$product->id])); ?>" method="POST" enctype="multipart/form-data" >
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="oldImage" value="<?php echo e($product->image); ?>">
                        <div class="mb-3">
                            <label for="name_product" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name_product" name="name_product"
                                value="<?php echo e($product->name_product); ?>" readonly>
                            <?php $__errorArgs = ['name_product'];
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
                            <label for="code_product" class="form-label">Product Code</label>
                            <input type="text" class="form-control" id="code_product" name="code_product"
                                value="<?php echo e($product->code_product); ?>" readonly>
                            <?php $__errorArgs = ['code_product'];
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
                        <div id="generatedTableContainer"></div>
                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">warehouse</label>
                            <select class="form-select" id="warehouse_id" name="warehouse_id"
                                value="<?php echo e(old('name_warehouse')); ?>" required>
                                <option value="">pilih warehouse</option>
                                <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($warehouse->id == $product->warehouse_id): ?>
                                  <option value="<?php echo e($warehouse->id); ?>" selected><?php echo e($warehouse->name_warehouse); ?></option>
                                  <?php else: ?>
                                  <option value="<?php echo e($warehouse->id); ?>"><?php echo e($warehouse->name_warehouse); ?></option>
                                  <?php endif; ?>
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
                            <label for="warehouse_id" class="form-label">Kategori</label>
                            <select class="form-select" id="category_id" name="category_id"
                                value="<?php echo e(old('name_warehouse')); ?>" required>
                                <option value="">pilih kategori</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($category->id == $product->category_id): ?>
                                  <option value="<?php echo e($category->id); ?>" selected><?php echo e($category->name_category); ?></option>
                                  <?php else: ?>
                                  <option value="<?php echo e($category->id); ?>"><?php echo e($category->name_category); ?></option>
                                  <?php endif; ?>
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
                            <label for="price" class="form-label">Harga Produk</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="<?php echo e($product->price); ?>" required>
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
                            <label for="stock_product" class="form-label">Stock Produk</label>
                            <input type="number" class="form-control" id="stock_product" name="stock_product"
                                value="<?php echo e($product->stock_product); ?>" required>
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
                            <img src="<?php echo e(asset('public/product_images/')); ?>/<?php echo e($product->image); ?>" id="img-view" width="50">
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


   

        function formatNumberToCurrency(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

       

</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/product/edit-product.blade.php ENDPATH**/ ?>