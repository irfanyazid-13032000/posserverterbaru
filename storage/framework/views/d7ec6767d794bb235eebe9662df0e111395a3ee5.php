<ul class="product__tab--one product__tab--btn d-flex justify-content-center mb-35">
                        <li class="product__tab--btn__list" data-toggle="tab" onclick="changeCategory(0)">All</li>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="product__tab--btn__list" data-toggle="tab" onclick="changeCategory(<?php echo e($category->id); ?>)"><?php echo e($category->name_category); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/pos/categories.blade.php ENDPATH**/ ?>