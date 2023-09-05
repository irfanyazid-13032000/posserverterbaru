@extends('layouts.guest')

@php
    $setting = App\Models\Utility::settings();
    $languages = App\Models\Utility::languages();
@endphp
@section('title')
    {{ __('Login') }}
@endsection

@section('language-bar')
    <li class="dropdown dash-h-item drp-language login_drp_language">
        <a class="dash-head-link dropdown-toggle arrow-none me-1" data-bs-toggle="dropdown" href="#"
            role="button" aria-haspopup="false" aria-expanded="false">
            <i class="ti ti-world nocolor"></i>
            <span class="drp-text">{{ Str::ucfirst($language_name->fullname) }}</span>
            <i class="ti ti-chevron-down drp-arrow nocolor"></i>
        </a>
        <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
            @foreach (App\Models\Utility::languages() as $code => $language)
                <a href="{{ route('login', $code) }}"
                    class="dropdown-item {{ $lang == $code ? 'text-primary' : '' }}">
                    <span>{{ Str::ucfirst($language) }}</span>
                </a>
            @endforeach
        </div>
    </li>
@endsection

@section('landing_btn')
    @include('landingpage::layouts.buttons')
@endsection

@section('content')
    <div class="card-body">
        <div class="">
            <h2 class="mb-3 f-w-600">{{ __('Login') }}</h2>
        </div>
        <form method="POST" action="{{ route('login') }}" id="form_data" class="needs-validation" novalidate="">
            @csrf
            <div class="">
                <div class="form-group mb-3">
                    <label class="form-label">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <label class="form-label">{{ __('Password') }}</label>
                        </div>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <div class="mb-3">
                        <div class="text-left">
                            @if (Route::has('change.langPass'))
                                <a href="{{ route('change.langPass', $lang) }}"
                                    class="small text-muted text-underline--dashed border-primary">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                @if (env('RECAPTCHA_MODULE') == 'yes')
                    <div class="form-group mb-3">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                        @error('g-recaptcha-response')
                            <span class="small text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                @endif

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block mt-2"
                        id="login_button">{{ __('Login') }}</button>
                </div>
                @if (Utility::getValByName('signup_button') == 'on')
                    <div class="my-4 text-xs text-muted text-center">
                        <p>{{ __("Don't have an account?") }} <a
                                href="{{ route('register', $lang) }}">{{ __('Register') }}</a></p>

                    </div>
                @endif
            </div>
        </form>
    </div>
@endsection
@push('custom-scripts')
    <script src="{{ asset('custom/libs/jquery/dist/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#form_data").submit(function(e) {
                $("#login_button").attr("disabled", true);
                return true;
            });
        });
    </script>

@endpush
