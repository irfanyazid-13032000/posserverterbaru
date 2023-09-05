<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Order')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Orders')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>

    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Orders')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <div class="row  m-1">
        <div class="col-auto pe-0">
            <a href="<?php echo e(route('order.export', $store->id)); ?>" class="btn btn-sm btn-icon  bg-light-secondary me-2"
                data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Export')); ?>">
                <i data-feather="download"></i>
            </a>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table mb-0 pc-dt-simple" id="pc-dt-simple">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Order')); ?></th>
                                    <th><?php echo e(__('Date')); ?></th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Value')); ?></th>
                                    <th><?php echo e(__('Payment Type')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="<?php echo e(route('orders.show', \Illuminate\Support\Facades\Crypt::encrypt($order->id))); ?>"
                                                    class="btn btn-sm btn-white btn-icon order-badge btn-outline-primary"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-original-title="<?php echo e(__('Click to copy link')); ?>">
                                                    <span class="btn-inner--text"><?php echo e($order->order_id); ?></span>
                                                </a>
                                            </div>
                                        </td>
                                        <td><?php echo e(\App\Models\Utility::dateFormat($order->created_at)); ?></td>
                                        <td><?php echo e($order->name); ?></td>
                                        <td><?php echo e(\App\Models\Utility::priceFormat($order->price)); ?></td>
                                        <td><?php echo e($order->payment_type); ?></td>
                                        <td>
                                            <?php if($order->status != 'Cancel Order'): ?>
                                                <button type="button"
                                                    class="btn btn-sm <?php echo e($order->status == 'pending' ? 'btn-soft-info' : 'btn-soft-primary'); ?> btn-icon rounded-pill">
                                                    <span class="btn-inner--icon">
                                                        <?php if($order->status == 'pending'): ?>
                                                            <i class="fas fa-check soft-primary"></i>
                                                        <?php else: ?>
                                                            <i class="fa fa-check-double soft-primary"></i>
                                                        <?php endif; ?>
                                                    </span>
                                                    <?php if($order->status == 'pending'): ?>
                                                        <span class="btn-inner--text">
                                                            <?php echo e(__('Pending')); ?>:
                                                            <?php echo e(\App\Models\Utility::dateFormat($order->created_at)); ?>

                                                        </span>
                                                    <?php else: ?>
                                                        <span class="btn-inner--text">
                                                            <?php echo e(__('Delivered')); ?>:
                                                            <?php echo e(\App\Models\Utility::dateFormat($order->updated_at)); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </button>
                                            <?php else: ?>
                                                <button type="button"
                                                    class="btn btn-sm btn-soft-secondary btn-icon rounded-pill">
                                                    <span class="btn-inner--icon">
                                                        <?php if($order->status == 'pending'): ?>
                                                            <i class="fas fa-check soft-primary"></i>
                                                        <?php else: ?>
                                                            <i class="fa fa-check-double soft-primary"></i>
                                                        <?php endif; ?>
                                                    </span>
                                                    <span class="btn-inner--text">
                                                        <?php echo e(__('Cancel Order')); ?>:
                                                        <?php echo e(\App\Models\Utility::dateFormat($order->created_at)); ?>

                                                    </span>
                                                </button>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Orders')): ?>
                                                    <a class="btn btn-sm btn-icon  bg-light-secondary me-2"
                                                        href="<?php echo e(route('orders.show', \Illuminate\Support\Facades\Crypt::encrypt($order->id))); ?>" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"  data-bs-original-title="<?php echo e(__('View')); ?>">
                                                        <i class="ti ti-eye f-20"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Orders')): ?>
                                                    <?php echo Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['orders.destroy', $order->id],
                                                        'id' => 'delete-form-' . $order->id,
                                                    ]); ?>

                                                    <a class=" show_confirm btn btn-sm btn-icon  bg-light-secondary me-2"
                                                        href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('Delete')); ?>">
                                                        <i class="ti ti-trash f-20"></i>
                                                    </a>
                                                    <?php echo Form::close(); ?>

                                                <?php endif; ?>
                                            </div>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/touramin/public_html/sem/resources/views/orders/index.blade.php ENDPATH**/ ?>