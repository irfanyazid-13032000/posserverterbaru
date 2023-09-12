<div class="row row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n28">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <div class="col mb-28">
                                        <div class="product__items product__items2">
                                            <div class="product__items--thumbnail">
                                                <span class="product__items--link" onclick="insertCart(<?php echo e($product->id); ?>)">
                                                    <img class="product__items--img product__primary--img" src="<?php echo e(asset('public/product_images')); ?>/<?php echo e($product->image); ?>" alt="product-img">
                                                </span>
                                            </div>
                                            <div class="product__items--content product__items2--content text-center">
                                                <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                                <h3 class="product__items--content__title h4"><a href="product-details.html"><?php echo e($product->name_product); ?></a></h3>
                                                <div class="product__items--price">
                                                    <span class="current__price">Rp. <?php echo e(number_format($product->price)); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/pos/products.blade.php ENDPATH**/ ?>