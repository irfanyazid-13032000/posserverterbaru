<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Plans')); ?>

<?php $__env->stopSection(); ?>
<?php
    $dir = asset(Storage::url('uploads/plan'));
    $user = Auth::user();
?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>

    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Plans')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Plans')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <?php if(Auth::user()->type == 'super admin'): ?>
        <?php if(
            (isset($admin_payments_setting['is_stripe_enabled']) && $admin_payments_setting['is_stripe_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_paypal_enabled']) && $admin_payments_setting['is_paypal_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_paystack_enabled']) &&
                    $admin_payments_setting['is_paystack_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_flutterwave_enabled']) &&
                    $admin_payments_setting['is_flutterwave_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_razorpay_enabled']) &&
                    $admin_payments_setting['is_razorpay_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_mercado_enabled']) &&
                    $admin_payments_setting['is_mercado_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_paytm_enabled']) && $admin_payments_setting['is_paytm_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_mollie_enabled']) && $admin_payments_setting['is_mollie_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_skrill_enabled']) && $admin_payments_setting['is_skrill_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_coingate_enabled']) &&
                    $admin_payments_setting['is_coingate_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_paymentwall_enabled']) &&
                    $admin_payments_setting['is_paymentwall_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_payfast_enabled']) &&
                    $admin_payments_setting['is_payfast_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_toyyibpay_enabled']) &&
                    $admin_payments_setting['is_toyyibpay_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_manuallypay_enabled']) &&
                    $admin_payments_setting['is_manuallypay_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_bank_enabled']) && $admin_payments_setting['is_bank_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_iyzipay_enabled']) &&
                    $admin_payments_setting['is_iyzipay_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_sspay_enabled']) && $admin_payments_setting['is_sspay_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_paytab_enabled']) && $admin_payments_setting['is_paytab_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_benefit_enabled']) &&
                    $admin_payments_setting['is_benefit_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_cashfree_enabled']) &&
                    $admin_payments_setting['is_cashfree_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_aamarpay_enabled']) &&
                    $admin_payments_setting['is_aamarpay_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_paytr_enabled']) && $admin_payments_setting['is_paytr_enabled'] == 'on')): ?>
            <div class="row  m-1">
                <div class="col-auto pe-0">
                    <a class="btn btn-sm btn-icon text-white btn-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="<?php echo e(__('Add Plan ')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Add Plan')); ?>"
                        data-url="<?php echo e(route('plans.create')); ?>">
                        <i data-feather="plus"></i>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="plan_card">
                <div class="card price-card price-1 wow animate__fadeInUp" data-wow-delay="0.2s"
                    style="
                                    visibility: visible;
                                    animation-delay: 0.2s;
                                    animation-name: fadeInUp;
                                  ">
                    <div class="card-body plans_card_body">
                        <span class="price-badge bg-primary"><?php echo e($plan->name); ?></span>
                        <?php if(\Auth::user()->type == 'super admin'): ?>
                            <div class="d-flex flex-row-reverse m-0 p-0 ">
                                <a class="btn btn-sm btn-icon  bg-light-secondary me-2" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="<?php echo e(__('Edit Plan')); ?>" data-ajax-popup="true"
                                    data-size="lg" data-title="<?php echo e(__('Edit Plan')); ?>"
                                    data-url="<?php echo e(route('plans.edit', $plan->id)); ?>">
                                    <i class="ti ti-edit f-20"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if(\Auth::user()->type == 'Owner' && \Auth::user()->plan == $plan->id): ?>
                            <div class="d-flex flex-row-reverse m-0 p-0 ">
                                <span class="d-flex align-items-center ">
                                    <i class="f-10 lh-1 fas fa-circle text-primary"></i>
                                    <span class="ms-2"><?php echo e(__('Active')); ?></span>
                                </span>
                            </div>
                        <?php endif; ?>
                        <h3 class="mb-4 f-w-600">
                            <?php echo e(env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$'); ?><?php echo e($plan->price . ' / ' . __(\App\Models\Plan::$arrDuration[$plan->duration])); ?></small>
                            </h1>
                            <div class="">

                                <?php if($plan->description): ?>
                                    <p class="mb-0">
                                        <?php echo e($plan->description); ?><br />
                                    </p>
                                <?php endif; ?>
                                
                                <ul class="list-unstyled my-5">
                                    <li>
                                        <?php if($plan->enable_custdomain == 'on'): ?>
                                            <span class="theme-avtar">
                                                <i class="text-primary ti ti-circle-plus"></i></span>
                                            <?php echo e(__('Custom Domain')); ?>

                                        <?php else: ?>
                                            <span class="theme-avtar">
                                                <i class="text-danger ti ti-circle-plus"></i></span>
                                            <?php echo e(__('Custom Domain')); ?>

                                        <?php endif; ?>
                                    </li>
                                    <li>
                                        <?php if($plan->enable_custsubdomain == 'on'): ?>
                                            <span class="theme-avtar">
                                                <i class="text-primary ti ti-circle-plus"></i></span>
                                            <?php echo e(__('Sub Domain')); ?>

                                        <?php else: ?>
                                            <span class="theme-avtar">
                                                <i class="text-danger ti ti-circle-plus"></i></span>
                                            <?php echo e(__('Sub Domain')); ?>

                                        <?php endif; ?>
                                    </li>
                                    <li>
                                        <?php if($plan->shipping_method == 'on'): ?>
                                            <span class="theme-avtar">
                                                <i class="text-primary ti ti-circle-plus"></i></span>
                                            <?php echo e(__('Shipping  Method')); ?>

                                        <?php else: ?>
                                            <span class="theme-avtar">
                                                <i class="text-danger ti ti-circle-plus"></i></span>
                                            <?php echo e(__('Shipping  Method')); ?>

                                        <?php endif; ?>

                                    </li>
                                    <li>
                                        <?php if($plan->pwa_store == 'on'): ?>
                                            <span class="theme-avtar">
                                                <i class="text-primary ti ti-circle-plus"></i></span>
                                            <?php echo e(__('Progressive Web App ( PWA )')); ?>

                                        <?php else: ?>
                                            <span class="theme-avtar">
                                                <i class="text-danger ti ti-circle-plus"></i></span>
                                            <?php echo e(__('Progressive Web App ( PWA )')); ?>

                                        <?php endif; ?>
                                    </li>
                                    <li>
                                        <?php if($plan->storage_limit != '0'): ?>
                                            <span class="theme-avtar">
                                                <i class="text-primary ti ti-circle-plus"></i></span>
                                            <?php if($plan->storage_limit == '-1'): ?>
                                                <?php echo e(__('Storage Limit : ')); ?><?php echo e(__('Unlimited')); ?>

                                            <?php else: ?>
                                                <?php echo e(__('Storage Limit : ')); ?><?php echo e($plan->storage_limit); ?><?php echo e(' MB'); ?>

                                            <?php endif; ?>
                                        <?php else: ?>
                                            <span class="theme-avtar">
                                                <i class="text-danger ti ti-circle-plus"></i></span>
                                            <?php echo e(__('Storage Limit : ')); ?><?php echo e($plan->storage_limit); ?><?php echo e(' MB'); ?>

                                        <?php endif; ?>
                                    </li>
                                    <li>
                                        <?php if($plan->enable_chatgpt == 'on'): ?>
                                            <span class="theme-avtar">
                                                <i class="text-primary ti ti-circle-plus"></i></span>
                                            <?php echo e(__('Chat GPT')); ?>

                                        <?php else: ?>
                                            <span class="theme-avtar">
                                                <i class="text-danger ti ti-circle-plus"></i></span>
                                            <?php echo e(__('Chat GPT')); ?>

                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>

                            <div class="row mb-3">
                                <div class="col-4 text-center ">
                                    <b>
                                        <?php if($plan->max_products == '-1'): ?>
                                            <span class="h6 mt-3"><?php echo e(__('Unlimited')); ?></span>
                                        <?php else: ?>
                                            <span class="h5 mb-0"><?php echo e($plan->max_products); ?></span>
                                        <?php endif; ?>
                                    </b>
                                    <span class="d-block text-sm"><?php echo e(__('Products')); ?></span>
                                </div>
                                <div class="col-4 text-center">
                                    <span class="h5 mb-0">
                                        <?php if($plan->max_stores == '-1'): ?>
                                            <span class="h5 mb-0"><?php echo e(__('Unlimited')); ?></span>
                                        <?php else: ?>
                                            <span class="h5 mb-0"><?php echo e($plan->max_stores); ?></span>
                                        <?php endif; ?>
                                    </span>
                                    <span class="d-block text-sm"><?php echo e(__('Store')); ?></span>
                                </div>
                                <div class="col-4 text-center">
                                    <span class="h5 mb-0">
                                        <?php if($plan->max_users == '-1'): ?>
                                            <span class="h5 mb-0"><?php echo e(__('Unlimited')); ?></span>
                                        <?php else: ?>
                                            <span class="h5 mb-0"><?php echo e($plan->max_users); ?></span>
                                        <?php endif; ?>
                                    </span>
                                    <span class="d-block text-sm"><?php echo e(__('Users')); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <?php if(\Auth::user()->type != 'super admin'): ?>
                                    <?php if($plan->price <= 0): ?>
                                        <div class="col-12">
                                            <p class="server-plan font-bold text-center mx-sm-5 mt-4">
                                                <?php echo e(__('Lifetime')); ?>

                                            </p>
                                        </div>
                                    <?php elseif(
                                        \Auth::user()->plan == $plan->id &&
                                            date('Y-m-d') < \Auth::user()->plan_expire_date == null &&
                                            \Auth::user()->is_trial_done != 1): ?>
                                        <h5 class="h6 mt-3">
                                            <?php echo e(\Auth::user()->plan_expire_date ? \App\Models\Utility::dateFormat(\Auth::user()->plan_expire_date) : __('Lifetime')); ?>

                                        </h5>
                                    <?php elseif(
                                        \Auth::user()->plan == $plan->id &&
                                            date('Y-m-d') < \Auth::user()->plan_expire_date &&
                                            \Auth::user()->is_trial_done != 1): ?>
                                        <h5 class="h6 mt-3">
                                            <?php echo e(__('Expired : ')); ?>

                                            <?php echo e(\Auth::user()->plan_expire_date ? \App\Models\Utility::dateFormat(\Auth::user()->plan_expire_date) : __('Lifetime')); ?>

                                        </h5>
                                    <?php elseif(
                                        \Auth::user()->plan == $plan->id &&
                                            !empty(\Auth::user()->plan_expire_date) &&
                                            \Auth::user()->plan_expire_date < date('Y-m-d')): ?>
                                        <div class="col-12">
                                            <p class="server-plan font-weight-bold text-center mx-sm-5">
                                                <?php echo e(__('Expired')); ?>

                                            </p>
                                        </div>
                                    <?php else: ?>
                                        <div class="<?php echo e($plan->id == 1 ? 'col-12' : 'col-8'); ?>">
                                            <a href="<?php echo e(route('stripe', \Illuminate\Support\Facades\Crypt::encrypt($plan->id))); ?>"
                                                class="btn  btn-primary d-flex justify-content-center align-items-center "><?php echo e(__('Subscribe')); ?>

                                                <i class="fas fa-arrow-right m-1"></i></a>
                                            <p></p>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if(\Auth::user()->type != 'super admin' && \Auth::user()->plan != $plan->id): ?>
                                    <?php if($plan->id != 1): ?>
                                        <?php if(\Auth::user()->requested_plan != $plan->id): ?>
                                            <div class="col-4">
                                                <a href="<?php echo e(route('send.request', [\Illuminate\Support\Facades\Crypt::encrypt($plan->id)])); ?>"
                                                    class="btn btn-primary btn-icon m-1"
                                                    data-title="<?php echo e(__('Send Request')); ?>" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="<?php echo e(__('Send Request')); ?>">
                                                    <span class="btn-inner--icon"><i class="fas fa-share"></i></span>
                                                </a>
                                            </div>
                                        <?php else: ?>
                                            <div class="col-4">
                                                <a href="<?php echo e(route('request.cancel', \Auth::user()->id)); ?>"
                                                    class="btn btn-icon m-1 btn-danger"
                                                    data-title="<?php echo e(__('Cancle Request')); ?>"data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="<?php echo e(__('Cancle Request')); ?>">
                                                    <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <h5></h5>
                    <div class="table-responsive">
                        <table class="table mb-0 pc-dt-simple ">
                            <thead>
                                <tr>
                                    <th> <?php echo e(__('Order Id')); ?></th>
                                    <th><?php echo e(__('Date')); ?></th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Plan Name')); ?></th>
                                    <th> <?php echo e(__('Price')); ?></th>
                                    <th> <?php echo e(__('Payment Type')); ?></th>
                                    <th> <?php echo e(__('Status')); ?></th>
                                    <th> <?php echo e(__('Coupon')); ?></th>
                                    <th> <?php echo e(__('Invoice')); ?></th>
                                    <?php if(Auth::user()->type == 'super admin'): ?>
                                        <th> <?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($orders) && !empty($orders)): ?>
                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($order->order_id); ?></td>
                                            <td><?php echo e($order->created_at->format('d M Y')); ?></td>
                                            <td><?php echo e($order->user_name); ?></td>
                                            <td><?php echo e($order->plan_name); ?></td>
                                            <td><?php echo e(env('CURRENCY_SYMBOL') . $order->price); ?></td>
                                            <td><?php echo e($order->payment_type); ?></td>
                                            <td>
                                                <?php if(
                                                    $order->payment_status == 'succeeded' ||
                                                        $order->payment_status == 'Approved' ||
                                                        $order->payment_status == 'success'): ?>
                                                    <i class="mdi mdi-circle text-success"></i>
                                                    <span
                                                        class="badge rounded p-2 f-w-600  bg-light-primary"><?php echo e(ucfirst($order->payment_status)); ?></span>
                                                <?php elseif($order->payment_status == 'pending'): ?>
                                                    <i class="mdi mdi-circle text-danger"></i>
                                                    <span
                                                        class="badge rounded p-2 f-w-600  bg-light-warning"><?php echo e(ucfirst($order->payment_status)); ?></span>
                                                <?php else: ?>
                                                    <i class="mdi mdi-circle text-danger"></i>
                                                    <span
                                                        class="badge rounded p-2 f-w-600  bg-light-danger"><?php echo e(ucfirst($order->payment_status)); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(!empty($order->total_coupon_used) ? (!empty($order->total_coupon_used->coupon_detail) ? $order->total_coupon_used->coupon_detail->code : '-') : '-'); ?>

                                            </td>
                                            <td>
                                                <?php if($order->receipt != 'free coupon' && $order->payment_type == 'Bank Transfer'): ?>
                                                    <a href="<?php echo e(asset(Storage::url($order->receipt))); ?>" title="Invoice"
                                                        class="text-primary" target="_blank" class=""><i
                                                            class="ti ti-file-invoice"></i><?php echo e('Invoice'); ?>

                                                    </a>
                                                <?php elseif($order->payment_type == 'STRIPE' && $order->receipt != 0): ?>
                                                    <a href="<?php echo e($order->receipt); ?>" title="Invoice" class="text-primary"
                                                        target="_blank" class=""><i
                                                            class="ti ti-file-invoice"></i><?php echo e('Invoice'); ?>

                                                    </a>
                                                <?php elseif($order->receipt == 'free coupon'): ?>
                                                    <p><?php echo e(__('Used') . '100 %' . __('discount coupon code.')); ?></p>
                                                <?php elseif($order->payment_type == 'Manually'): ?>
                                                    <p><?php echo e(__('-')); ?></p>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <?php if(Auth::user()->type == 'super admin'): ?>
                                                <td>
                                                    <div class="d-flex">
                                                        <?php if(
                                                            $order->payment_type == 'Bank Transfer' &&
                                                                Auth::user()->type == 'super admin' &&
                                                                $order->payment_status == 'pending'): ?>
                                                            <a class="btn btn-sm btn-icon  bg-light-secondary me-2 "
                                                                data-url="<?php echo e(route('bank_transfer.show', $order->id)); ?>"
                                                                data-ajax-popup="true" data-size="lg"
                                                                data-title="<?php echo e(__('Payment Status')); ?>"><i
                                                                    class="ti ti-player-play"></i></a>
                                                        <?php endif; ?>

                                                        <?php echo Form::open(['method' => 'Delete', 'route' => ['delete.plan_order', $order->id]]); ?>

                                                        <a class="btn btn-sm btn-icon  bg-light-secondary me-2 show_confirm"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Delete">
                                                            <i class="ti ti-trash f-20"></i>
                                                        </a>
                                                        <?php echo Form::close(); ?>

                                                    </div>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7">
                                            <div class="text-center">
                                                <i class="fas fa-folder-open text-primary" style="font-size: 48px;"></i>
                                                <h2>Opps...</h2>
                                                <h6>No data Found. </h6>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var tohref = '';
            <?php if(Auth::user()->is_register_trial == 1): ?>
                tohref = $('#trial_<?php echo e(Auth::user()->interested_plan_id); ?>').attr("href");
            <?php elseif(Auth::user()->interested_plan_id != 0): ?>
                tohref = $('#interested_plan_<?php echo e(Auth::user()->interested_plan_id); ?>').attr("href");
            <?php endif; ?>

            if (tohref != '') {
                window.location = tohref;
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/touramin/public_html/sem/resources/views/plans/index.blade.php ENDPATH**/ ?>