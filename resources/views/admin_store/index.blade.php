@extends('layouts.admin')
@section('page-title')
    {{ __('WhatsStore') }}
@endsection
@section('title')
    {{ __('Store') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>

    <li class="breadcrumb-item active" aria-current="page">{{ __('Stores') }}</li>
@endsection

@section('action-btn')
    <div class="row gy-4  m-1">
        <div class="col-auto pe-0">
            <a href="{{ route('store.subDomain') }}" class="btn btn-sm btn-light-primary me-2">
                {{ __('Sub Domain') }}
            </a>
        </div>
        <div class="col-auto pe-0">
            <a class="btn btn-sm btn-light-primary me-2" href="{{ route('store.customDomain') }}">
                {{ __('Custom Domain') }}
            </a>
        </div>
        <div class="col-auto pe-0">
            <a href="{{ route('store.grid') }}" class="btn btn-sm btn-icon  bg-light-secondary me-2"
                data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Grid View') }}">
                <i class="ti ti-grid-dots f-30"></i>
            </a>
        </div>
        <div class="col-auto pe-0">
            <a href="{{ route('store.export', $store) }} " class="btn btn-sm btn-icon  bg-light-secondary me-2"
                data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Export') }}">
                <i class="ti ti-download"></i>
            </a>
        </div>
        <div class="col-auto pe-0">
            <a class="btn btn-sm btn-icon text-white btn-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top"
                title="{{ __('Create ') }}" data-size="lg" data-ajax-popup="true"
                data-title="{{ __('Create New Store') }}" data-url="{{ route('store-resource.create') }}">
                <i data-feather="plus"></i>
            </a>
        </div>
    </div>
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{ asset('custom/libs/summernote/summernote-bs4.css') }}">
@endpush
@push('script-page')
    <script src="{{ asset('custom/libs/summernote/summernote-bs4.js') }}"></script>
@endpush
@section('content')
    <!-- Listing -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table mb-0 pc-dt-simple">
                            <thead>
                                <tr>
                                    <th>{{ __('User Name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Stores') }}</th>
                                    <th>{{ __('Plan') }}</th>
                                    <th>{{ __('Created At') }}</th>
                                    <th>{{ __('Store Display') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $usr)
                                    <tr>
                                        <td>{{ $usr->name }}</td>
                                        <td>{{ $usr->email }}</td>
                                        <td>{{ $usr->stores->count() }}</td>
                                        <td>{{ !empty($usr->currentPlan->name) ? $usr->currentPlan->name : '-' }}</td>
                                        <td>{{ \App\Models\Utility::dateFormat($usr->created_at) }}</td>
                                        <td>
                                                <a href="#" data-size="md" class="form-switch disabled-form-switch"
                                                    data-url="{{ route('store-resource.edit.display', $usr->id) }}"
                                                    data-ajax-popup="true" class="action-item"
                                                    data-title="{{ __('Are You Sure?') }}"
                                                    data-title="{{ $usr->store_display == 1 ? 'Stores disable' : 'Store enable' }}">
                                                    <input type="checkbox" class="form-check-input" disabled="disabled"
                                                        name="store_display" id="{{ $usr->id }}"
                                                        {{ $usr->store_display == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="{{ $usr->id }}"></label>
                                                </a>
                                        </td>
                                        <td class="Action">
                                            <div class="d-flex">
                                                @can('Edit Store')
                                                    <a class="btn btn-sm btn-icon  bg-light-secondary me-2" data-size="lg"
                                                        data-url="{{ route('store-resource.edit', $usr->id) }}"
                                                        data-ajax-popup="true" data-title="{{ __('Edit Store') }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="{{ __('Edit') }}">
                                                        <i class="ti ti-edit f-20"></i>
                                                    </a>
                                                @endcan
                                                @can('Upgrade Plans')
                                                    <a class="btn btn-sm btn-icon  bg-light-secondary me-2" data-size="md"
                                                        data-url="{{ route('plan.upgrade', $usr->id) }}" data-ajax-popup="true"
                                                        data-title="{{ __('Upgrade Plan') }}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="{{ __('Upgrade Plan') }}">
                                                        <i class="ti ti-trophy f-20"></i>
                                                    </a>
                                                @endcan
                                                @can('Delete Store')
                                                    {!! Form::open(['method' => 'Delete', 'route' => ['store-resource.destroy', $usr->id]]) !!}
                                                    <a class="btn btn-sm btn-icon  bg-light-secondary me-2 show_confirm"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="{{ __('Delete') }}">
                                                        <i class="ti ti-trash f-20"></i>
                                                    </a>
                                                    {!! Form::close() !!}
                                                @endcan
                                                @can('Reset Password')
                                                    <a class="btn btn-sm btn-icon  bg-light-secondary me-2" data-size="md"
                                                        data-url="{{ route('user.reset', $usr->id) }}" data-ajax-popup="true"
                                                        data-title="{{ __('Reset Password') }}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="{{ __('Reset Password') }}">
                                                        <i class="ti ti-key f-20"></i>
                                                    </a>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-page')
    <script>
        $(document).on('click', '#billing_data', function() {
            $("[name='shipping_address']").val($("[name='billing_address']").val());
            $("[name='shipping_city']").val($("[name='billing_city']").val());
            $("[name='shipping_state']").val($("[name='billing_state']").val());
            $("[name='shipping_country']").val($("[name='billing_country']").val());
            $("[name='shipping_postalcode']").val($("[name='billing_postalcode']").val());
        })
    </script>
@endpush
