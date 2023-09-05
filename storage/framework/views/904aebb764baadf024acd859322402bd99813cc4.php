<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product Category')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Product Category')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>

    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Product Category')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <div class="row gy-4 align-items-center">
        <div class="col-auto">
            <div class="d-flex">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Product category')): ?>
                    <a class="btn btn-sm btn-icon text-white btn-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="<?php echo e(__('Create')); ?>" data-size="md" data-ajax-popup="true"
                        data-title="<?php echo e(__('Create New Category')); ?>" data-url="<?php echo e(route('product_categorie.create')); ?>">
                        <i data-feather="plus"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <h5></h5>
                    <div class="table-responsive">
                        <table class="table mb-0 pc-dt-simple ">
                            <thead>
                                <tr>

                                    <th scope="col" class="sort" data-sort="name"><?php echo e(__('Category Name')); ?>

                                    </th>
                                    <th class="text-right" width="200px"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $product_categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-name="<?php echo e($product_category->name); ?>">
                                        <td><?php echo e($product_category->name); ?></td>
                                        </td>
                                        <td class="Action text-end">
                                            <span>
                                                <div class="d-flex">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Product category')): ?>
                                                        <a href="#" data-size="md"
                                                            data-url="<?php echo e(route('product_categorie.edit', $product_category->id)); ?>"
                                                            data-ajax-popup="true" data-title="<?php echo e(__('Edit')); ?>"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="<?php echo e(__('Edit')); ?>"
                                                            class="btn btn-sm btn-icon bg-light-secondary me-2">
                                                            <i class="ti ti-edit f-20"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php echo Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['product_categorie.destroy', $product_category->id],
                                                        'id' => 'delete-form-' . $product_category->id,
                                                    ]); ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Product category')): ?>
                                                        <a class="btn btn-sm btn-icon bg-light-secondary me-2 show_confirm"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="<?php echo e(__('Delete')); ?>">
                                                            <i class="ti ti-trash f-20"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php echo Form::close(); ?>

                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).ready(function() {
            $(document).on('keyup', '.search-user', function() {
                var value = $(this).val();
                $('.employee_tableese tbody>tr').each(function(index) {
                    var name = $(this).attr('data-name').toLowerCase();
                    if (name.includes(value.toLowerCase())) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
        $('#search').keydown(function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                return false;
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/touramin/public_html/sem/resources/views/product_category/index.blade.php ENDPATH**/ ?>