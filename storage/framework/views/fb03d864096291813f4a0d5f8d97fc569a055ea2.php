<form method="post" action="<?php echo e(route('users.store')); ?>">
    <?php echo csrf_field(); ?>
    <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-12">
                <?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Name'), 'required' => 'required'])); ?>

            </div>
            <div class="form-group col-md-12">
                <?php echo e(Form::label('Email', __('Email'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::email('email', null, ['class' => 'form-control', 'placeholder' => __('Enter Email'), 'required' => 'required'])); ?>

            </div>
            <div class="form-group col-md-12">
                <?php echo e(Form::label('Password', __('Password'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::password('password', ['class' => 'form-control', 'placeholder' => __('Enter Password'), 'required' => 'required'])); ?>

            </div>
            <div class="form-group col-md-12">
                <?php echo e(Form::label('User Role', __('User Role'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::select('role', $roles, null, ['class' => 'form-control', 'placeholder' => __('Select Role'), 'required' => 'required'])); ?>

            </div>
            <div class="form-group col-12 d-flex justify-content-end col-form-label">
                <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary btn-light"
                    data-bs-dismiss="modal">
                <input type="submit" value="<?php echo e(__('Save')); ?>" class="btn btn-primary ms-2">
            </div>
        </div>
    </div>
</form>
<?php /**PATH /home/touramin/public_html/sem/resources/views/users/create.blade.php ENDPATH**/ ?>