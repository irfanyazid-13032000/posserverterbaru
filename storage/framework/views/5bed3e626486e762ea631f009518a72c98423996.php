    <div class="modal-body">
    
        <?php echo Form::open(array('route' => array('customer.login', $slug,(!empty($is_cart) && $is_cart==true)?$is_cart:false),'class'=>'login-form-main'),['method'=>'POST']); ?>

        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label"><?php echo e(__('Email')); ?></label>
            <?php echo e(Form::text('email',null,array('class'=>'form-control'))); ?>

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label"><?php echo e(__('Password')); ?></label>
            <?php echo e(Form::password('password',array('class'=>'form-control','id'=>'exampleInputPassword1'))); ?>

        </div>
        <div class="form-group d-flex align-items-center text-left">
            <button type="submit" class="btn btn-secondary"><?php echo e(__('Login')); ?></button>
        </div>
        <div class="float-left">
            <?php echo e(__('Don\'t have account ?')); ?>

            <a data-url="<?php echo e(route('store.usercreate',$slug)); ?>" data-ajax-popup="true" data-title="Register" data-toggle="modal" class="login-form-main-a text-primary"><p><?php echo e(__('Register')); ?></p></a>
        </div>
    
    <?php echo Form::close(); ?>

</div>
<?php /**PATH /home/touramin/public_html/sem/resources/views/storefront/theme_1_to_6/user/login.blade.php ENDPATH**/ ?>