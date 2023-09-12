<form action="<?php echo e(route('cart.checkout')); ?>" method="post">
                <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=> $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo csrf_field(); ?>

                    <input type="hidden" name="cart[<?php echo e($index); ?>][product_id]" value="<?php echo e($cart->product_id); ?>">
                    <input type="hidden" name="cart[<?php echo e($index); ?>][price]" value="<?php echo e($cart->price); ?>">
                    <input type="hidden" name="cart[<?php echo e($index); ?>][qty]" value="<?php echo e($cart->qty); ?>">
                    <input type="hidden" name="cart[<?php echo e($index); ?>][total_price]" value="<?php echo e($cart->total_price); ?>">

<div class="minicart__product--items d-flex">
                    <div class="minicart__thumb">
                        <a href="product-details.html"><img src="<?php echo e(asset('storage/product_images')); ?>/<?php echo e($cart->image); ?>" alt="product-img"></a>
                    </div>
                    <div class="minicart__text">
                        <h4 class="minicart__subtitle"><a href="product-details.html"><?php echo e($cart->name_product); ?></a></h4>
                        <div class="minicart__price">
                            <span class="current__price">Rp. <?php echo e(number_format($cart->price)); ?></span>
                        </div>
                        <div class="minicart__text--footer d-flex align-items-center">
                            <div class="quantity__box minicart__quantity">
                                <span onclick="decrease(<?php echo e($cart->id); ?>)" type="button" class="quantity__value decrease" aria-label="quantity value" value="Decrease Value">-</span>
                                <label>
                                    <input type="number" class="quantity__number" value="<?php echo e($cart->qty); ?>" />
                                </label>
                                <span onclick="increase(<?php echo e($cart->id); ?>)" type="button" class="quantity__value increase" aria-label="quantity value" value="Increase Value">+</span>
                            </div>
                            <!-- <a class="minicart__product--remove" href="{/{route('cart.remove',['id'=>$cart->id])}}" type="button">Remove</a> -->
                            <span class="minicart__product--remove" onclick="remove(<?php echo e($cart->id); ?>)">remove</span>

                            
                        </div>
                        <h4 class="minicart__subtitle">total price</h4>
                        <span class="current__price">Rp. <?php echo e(number_format($cart->total_price)); ?></span>
                    </div>
                </div>

                <?php if($cart->qty <= 0): ?>
                <script>
                  remove(<?php echo e($cart->id); ?>)
                </script>
                <?php endif; ?>
    


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
           
                


</div>
    
<div id="total_amount"></div>
    
               
                
    <div class="minicart__button d-flex justify-content-center">
      <button class="btn minicart__button--link" type="submit">Submit</button>
  </form><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/pos/cart.blade.php ENDPATH**/ ?>