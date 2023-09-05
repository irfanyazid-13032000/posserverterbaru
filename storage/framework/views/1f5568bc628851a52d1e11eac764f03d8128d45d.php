<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('users')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Users')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create User')): ?>
    <a class="btn btn-sm btn-icon text-white  btn-primary me-2" data-url="<?php echo e(route('users.create')); ?>" data-title="<?php echo e(__('Add User')); ?>"
        data-ajax-popup="true" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Create')); ?>">
        <i data-feather="plus"></i>
    </a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php
    $logo = \App\Models\Utility::get_file('uploads/profile/');
?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="card text-center">
                    <div class="card-header border-0 pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">
                                <div class="badge p-2 px-3 rounded bg-primary"><?php echo e(ucfirst($user->type)); ?></div>
                            </h6>
                        </div>
                        <?php if(Gate::check('Edit User') || Gate::check('Delete User') || Gate::check('Reset Password')): ?>
                            <div class="card-header-right">
                                <div class="btn-group card-option">
                                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="feather icon-more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit User')): ?>
                                            <a href="#" class="dropdown-item"
                                                data-url="<?php echo e(route('users.edit', $user->id)); ?>" data-size="md"
                                                data-ajax-popup="true" data-title="<?php echo e(__('Update User')); ?>">
                                                <i class="ti ti-edit"></i>
                                                <span class="ms-2"><?php echo e(__('Edit')); ?></span>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Reset Password')): ?>
                                            <a href="#" class="dropdown-item"
                                                data-url="<?php echo e(route('users.reset', \Crypt::encrypt($user->id))); ?>"
                                                data-ajax-popup="true" data-size="md" data-title="<?php echo e(__('Change Password')); ?>">
                                                <i class="ti ti-key"></i>
                                                <span class="ms-2"><?php echo e(__('Reset Password')); ?></span>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete User')): ?>
                                            <?php echo Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['users.destroy', $user->id],
                                                'id' => 'delete-form-' . $user->id,
                                            ]); ?>

                                            <a href="#" class="bs-pass-para dropdown-item"
                                                data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                data-confirm-yes="delete-form-<?php echo e($user->id); ?>" title="<?php echo e(__('Delete')); ?>"
                                                data-bs-toggle="tooltip" data-bs-placement="top"><i
                                                    class="ti ti-trash"></i><span class="ms-2"><?php echo e(__('Delete')); ?></span></a>
                                            <?php echo Form::close(); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="avatar">
                            <a href="<?php echo e(!empty($user->avatar) ? $profile . $user->avatar : $logo . 'avatar.png'); ?>"
                                target="_blank">
                                <img src="<?php echo e(!empty($user->avatar) ? $profile . $user->avatar : $logo . 'avatar.png'); ?>"
                                    class="rounded-circle" alt="">
                            </a>
                        </div>
                        <h4 class="mt-2 text-primary"><?php echo e($user->name); ?></h4>
                        <small class=""><?php echo e($user->email); ?></small>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create User')): ?>
                <a class="btn-addnew-project" data-url="<?php echo e(route('users.create')); ?>" data-title="<?php echo e(__('Add User')); ?>"
                    data-ajax-popup="true" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Create')); ?>"><i
                        class="ti ti-plus text-white"></i>
                    <div class="bg-primary proj-add-icon">
                        <i class="ti ti-plus"></i>
                    </div>
                    <h6 class="mt-4 mb-2"><?php echo e(__('New User')); ?></h6>
                    <p class="text-muted text-center"><?php echo e(__('Click here to add New User')); ?></p>
                </a>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/touramin/public_html/sem/resources/views/users/index.blade.php ENDPATH**/ ?>