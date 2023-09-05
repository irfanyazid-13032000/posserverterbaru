@extends('layouts.admin')
@section('page-title')
    {{ __('Plans') }}
@endsection
@php
    $dir = asset(Storage::url('uploads/plan'));
    $user = Auth::user();
@endphp
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>

    <li class="breadcrumb-item active" aria-current="page">{{ __('Plans') }}</li>
@endsection
@section('title')
    {{ __('Plans') }}
@endsection
@section('action-btn')
    @if (Auth::user()->type == 'super admin')
        @if (
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
                (isset($admin_payments_setting['is_paytr_enabled']) && $admin_payments_setting['is_paytr_enabled'] == 'on'))
            <div class="row  m-1">
                <div class="col-auto pe-0">
                    <a class="btn btn-sm btn-icon text-white btn-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('Add Plan ') }}" data-size="lg" data-ajax-popup="true" data-title="{{ __('Add Plan') }}"
                        data-url="{{ route('plans.create') }}">
                        <i data-feather="plus"></i>
                    </a>
                </div>
            </div>
        @endif
    @endif
@endsection
@section('content')
    <div class="row">
        @foreach ($plans as $plan)
            <div class="plan_card">
                <div class="card price-card price-1 wow animate__fadeInUp" data-wow-delay="0.2s"
                    style="
                                    visibility: visible;
                                    animation-delay: 0.2s;
                                    animation-name: fadeInUp;
                                  ">
                    <div class="card-body plans_card_body">
                        <span class="price-badge bg-primary">{{ $plan->name }}</span>
                        @if (\Auth::user()->type == 'super admin')
                            <div class="d-flex flex-row-reverse m-0 p-0 ">
                                <a class="btn btn-sm btn-icon  bg-light-secondary me-2" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="{{ __('Edit Plan') }}" data-ajax-popup="true"
                                    data-size="lg" data-title="{{ __('Edit Plan') }}"
                                    data-url="{{ route('plans.edit', $plan->id) }}">
                                    <i class="ti ti-edit f-20"></i>
                                </a>
                            </div>
                        @endif
                        @if (\Auth::user()->type == 'Owner' && \Auth::user()->plan == $plan->id)
                            <div class="d-flex flex-row-reverse m-0 p-0 ">
                                <span class="d-flex align-items-center ">
                                    <i class="f-10 lh-1 fas fa-circle text-primary"></i>
                                    <span class="ms-2">{{ __('Active') }}</span>
                                </span>
                            </div>
                        @endif
                        <h3 class="mb-4 f-w-600">
                            {{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price . ' / ' . __(\App\Models\Plan::$arrDuration[$plan->duration]) }}</small>
                            </h1>
                            <div class="">

                                @if ($plan->description)
                                    <p class="mb-0">
                                        {{ $plan->description }}<br />
                                    </p>
                                @endif
                                {{-- <div class="row mt-1"> --}}
                                <ul class="list-unstyled my-5">
                                    <li>
                                        @if ($plan->enable_custdomain == 'on')
                                            <span class="theme-avtar">
                                                <i class="text-primary ti ti-circle-plus"></i></span>
                                            {{ __('Custom Domain') }}
                                        @else
                                            <span class="theme-avtar">
                                                <i class="text-danger ti ti-circle-plus"></i></span>
                                            {{ __('Custom Domain') }}
                                        @endif
                                    </li>
                                    <li>
                                        @if ($plan->enable_custsubdomain == 'on')
                                            <span class="theme-avtar">
                                                <i class="text-primary ti ti-circle-plus"></i></span>
                                            {{ __('Sub Domain') }}
                                        @else
                                            <span class="theme-avtar">
                                                <i class="text-danger ti ti-circle-plus"></i></span>
                                            {{ __('Sub Domain') }}
                                        @endif
                                    </li>
                                    <li>
                                        @if ($plan->shipping_method == 'on')
                                            <span class="theme-avtar">
                                                <i class="text-primary ti ti-circle-plus"></i></span>
                                            {{ __('Shipping  Method') }}
                                        @else
                                            <span class="theme-avtar">
                                                <i class="text-danger ti ti-circle-plus"></i></span>
                                            {{ __('Shipping  Method') }}
                                        @endif

                                    </li>
                                    <li>
                                        @if ($plan->pwa_store == 'on')
                                            <span class="theme-avtar">
                                                <i class="text-primary ti ti-circle-plus"></i></span>
                                            {{ __('Progressive Web App ( PWA )') }}
                                        @else
                                            <span class="theme-avtar">
                                                <i class="text-danger ti ti-circle-plus"></i></span>
                                            {{ __('Progressive Web App ( PWA )') }}
                                        @endif
                                    </li>
                                    <li>
                                        @if ($plan->storage_limit != '0')
                                            <span class="theme-avtar">
                                                <i class="text-primary ti ti-circle-plus"></i></span>
                                            @if ($plan->storage_limit == '-1')
                                                {{ __('Storage Limit : ') }}{{ __('Unlimited') }}
                                            @else
                                                {{ __('Storage Limit : ') }}{{ $plan->storage_limit }}{{ ' MB' }}
                                            @endif
                                        @else
                                            <span class="theme-avtar">
                                                <i class="text-danger ti ti-circle-plus"></i></span>
                                            {{ __('Storage Limit : ') }}{{ $plan->storage_limit }}{{ ' MB' }}
                                        @endif
                                    </li>
                                    <li>
                                        @if ($plan->enable_chatgpt == 'on')
                                            <span class="theme-avtar">
                                                <i class="text-primary ti ti-circle-plus"></i></span>
                                            {{ __('Chat GPT') }}
                                        @else
                                            <span class="theme-avtar">
                                                <i class="text-danger ti ti-circle-plus"></i></span>
                                            {{ __('Chat GPT') }}
                                        @endif
                                    </li>
                                </ul>
                            </div>

                            <div class="row mb-3">
                                <div class="col-4 text-center ">
                                    <b>
                                        @if ($plan->max_products == '-1')
                                            <span class="h6 mt-3">{{ __('Unlimited') }}</span>
                                        @else
                                            <span class="h5 mb-0">{{ $plan->max_products }}</span>
                                        @endif
                                    </b>
                                    <span class="d-block text-sm">{{ __('Products') }}</span>
                                </div>
                                <div class="col-4 text-center">
                                    <span class="h5 mb-0">
                                        @if ($plan->max_stores == '-1')
                                            <span class="h5 mb-0">{{ __('Unlimited') }}</span>
                                        @else
                                            <span class="h5 mb-0">{{ $plan->max_stores }}</span>
                                        @endif
                                    </span>
                                    <span class="d-block text-sm">{{ __('Store') }}</span>
                                </div>
                                <div class="col-4 text-center">
                                    <span class="h5 mb-0">
                                        @if ($plan->max_users == '-1')
                                            <span class="h5 mb-0">{{ __('Unlimited') }}</span>
                                        @else
                                            <span class="h5 mb-0">{{ $plan->max_users }}</span>
                                        @endif
                                    </span>
                                    <span class="d-block text-sm">{{ __('Users') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                @if (\Auth::user()->type != 'super admin')
                                    @if ($plan->price <= 0)
                                        <div class="col-12">
                                            <p class="server-plan font-bold text-center mx-sm-5 mt-4">
                                                {{ __('Lifetime') }}
                                            </p>
                                        </div>
                                    @elseif (
                                        \Auth::user()->plan == $plan->id &&
                                            date('Y-m-d') < \Auth::user()->plan_expire_date == null &&
                                            \Auth::user()->is_trial_done != 1)
                                        <h5 class="h6 mt-3">
                                            {{ \Auth::user()->plan_expire_date ? \App\Models\Utility::dateFormat(\Auth::user()->plan_expire_date) : __('Lifetime') }}
                                        </h5>
                                    @elseif (
                                        \Auth::user()->plan == $plan->id &&
                                            date('Y-m-d') < \Auth::user()->plan_expire_date &&
                                            \Auth::user()->is_trial_done != 1)
                                        <h5 class="h6 mt-3">
                                            {{ __('Expired : ') }}
                                            {{ \Auth::user()->plan_expire_date ? \App\Models\Utility::dateFormat(\Auth::user()->plan_expire_date) : __('Lifetime') }}
                                        </h5>
                                    @elseif(
                                        \Auth::user()->plan == $plan->id &&
                                            !empty(\Auth::user()->plan_expire_date) &&
                                            \Auth::user()->plan_expire_date < date('Y-m-d'))
                                        <div class="col-12">
                                            <p class="server-plan font-weight-bold text-center mx-sm-5">
                                                {{ __('Expired') }}
                                            </p>
                                        </div>
                                    @else
                                        <div class="{{ $plan->id == 1 ? 'col-12' : 'col-8' }}">
                                            <a href="{{ route('stripe', \Illuminate\Support\Facades\Crypt::encrypt($plan->id)) }}"
                                                class="btn  btn-primary d-flex justify-content-center align-items-center ">{{ __('Subscribe') }}
                                                <i class="fas fa-arrow-right m-1"></i></a>
                                            <p></p>
                                        </div>
                                    @endif
                                @endif
                                @if (\Auth::user()->type != 'super admin' && \Auth::user()->plan != $plan->id)
                                    @if ($plan->id != 1)
                                        @if (\Auth::user()->requested_plan != $plan->id)
                                            <div class="col-4">
                                                <a href="{{ route('send.request', [\Illuminate\Support\Facades\Crypt::encrypt($plan->id)]) }}"
                                                    class="btn btn-primary btn-icon m-1"
                                                    data-title="{{ __('Send Request') }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="{{ __('Send Request') }}">
                                                    <span class="btn-inner--icon"><i class="fas fa-share"></i></span>
                                                </a>
                                            </div>
                                        @else
                                            <div class="col-4">
                                                <a href="{{ route('request.cancel', \Auth::user()->id) }}"
                                                    class="btn btn-icon m-1 btn-danger"
                                                    data-title="{{ __('Cancle Request') }}"data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="{{ __('Cancle Request') }}">
                                                    <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                                </a>
                                            </div>
                                        @endif
                                    @endif
                                @endif
                            </div>
                    </div>
                </div>
            </div>
        @endforeach
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
                                    <th> {{ __('Order Id') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Plan Name') }}</th>
                                    <th> {{ __('Price') }}</th>
                                    <th> {{ __('Payment Type') }}</th>
                                    <th> {{ __('Status') }}</th>
                                    <th> {{ __('Coupon') }}</th>
                                    <th> {{ __('Invoice') }}</th>
                                    @if (Auth::user()->type == 'super admin')
                                        <th> {{ __('Action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($orders) && !empty($orders))
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->order_id }}</td>
                                            <td>{{ $order->created_at->format('d M Y') }}</td>
                                            <td>{{ $order->user_name }}</td>
                                            <td>{{ $order->plan_name }}</td>
                                            <td>{{ env('CURRENCY_SYMBOL') . $order->price }}</td>
                                            <td>{{ $order->payment_type }}</td>
                                            <td>
                                                @if (
                                                    $order->payment_status == 'succeeded' ||
                                                        $order->payment_status == 'Approved' ||
                                                        $order->payment_status == 'success')
                                                    <i class="mdi mdi-circle text-success"></i>
                                                    <span
                                                        class="badge rounded p-2 f-w-600  bg-light-primary">{{ ucfirst($order->payment_status) }}</span>
                                                @elseif($order->payment_status == 'pending')
                                                    <i class="mdi mdi-circle text-danger"></i>
                                                    <span
                                                        class="badge rounded p-2 f-w-600  bg-light-warning">{{ ucfirst($order->payment_status) }}</span>
                                                @else
                                                    <i class="mdi mdi-circle text-danger"></i>
                                                    <span
                                                        class="badge rounded p-2 f-w-600  bg-light-danger">{{ ucfirst($order->payment_status) }}</span>
                                                @endif
                                            </td>
                                            <td>{{ !empty($order->total_coupon_used) ? (!empty($order->total_coupon_used->coupon_detail) ? $order->total_coupon_used->coupon_detail->code : '-') : '-' }}
                                            </td>
                                            <td>
                                                @if ($order->receipt != 'free coupon' && $order->payment_type == 'Bank Transfer')
                                                    <a href="{{ asset(Storage::url($order->receipt)) }}" title="Invoice"
                                                        class="text-primary" target="_blank" class=""><i
                                                            class="ti ti-file-invoice"></i>{{ 'Invoice' }}
                                                    </a>
                                                @elseif($order->payment_type == 'STRIPE' && $order->receipt != 0)
                                                    <a href="{{ $order->receipt }}" title="Invoice" class="text-primary"
                                                        target="_blank" class=""><i
                                                            class="ti ti-file-invoice"></i>{{ 'Invoice' }}
                                                    </a>
                                                @elseif($order->receipt == 'free coupon')
                                                    <p>{{ __('Used') . '100 %' . __('discount coupon code.') }}</p>
                                                @elseif($order->payment_type == 'Manually')
                                                    <p>{{ __('-') }}</p>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            @if (Auth::user()->type == 'super admin')
                                                <td>
                                                    <div class="d-flex">
                                                        @if (
                                                            $order->payment_type == 'Bank Transfer' &&
                                                                Auth::user()->type == 'super admin' &&
                                                                $order->payment_status == 'pending')
                                                            <a class="btn btn-sm btn-icon  bg-light-secondary me-2 "
                                                                data-url="{{ route('bank_transfer.show', $order->id) }}"
                                                                data-ajax-popup="true" data-size="lg"
                                                                data-title="{{ __('Payment Status') }}"><i
                                                                    class="ti ti-player-play"></i></a>
                                                        @endif

                                                        {!! Form::open(['method' => 'Delete', 'route' => ['delete.plan_order', $order->id]]) !!}
                                                        <a class="btn btn-sm btn-icon  bg-light-secondary me-2 show_confirm"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="" data-bs-original-title="Delete">
                                                            <i class="ti ti-trash f-20"></i>
                                                        </a>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7">
                                            <div class="text-center">
                                                <i class="fas fa-folder-open text-primary" style="font-size: 48px;"></i>
                                                <h2>Opps...</h2>
                                                <h6>No data Found. </h6>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var tohref = '';
            @if (Auth::user()->is_register_trial == 1)
                tohref = $('#trial_{{ Auth::user()->interested_plan_id }}').attr("href");
            @elseif (Auth::user()->interested_plan_id != 0)
                tohref = $('#interested_plan_{{ Auth::user()->interested_plan_id }}').attr("href");
            @endif

            if (tohref != '') {
                window.location = tohref;
            }
        });
    </script>
@endpush
