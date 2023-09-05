<x-guest-layout>
    <x-auth-card>
        @section('title')
            {{ __('Reset Password') }}
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
                        <a href="{{ route('change.langPass', $code) }}"
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
                    <h2 class="mb-3 f-w-600">{{ __('Forgot Password') }}</h2>
                </div>
                @if (session('status'))
                    <div class="alert alert-primary">
                        {{ session('status') }}
                    </div>
                @endif
                <p class="mb-4 text-muted">{{ __('We will send a link to reset your password') }}</p>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="">

                        <div class="form-group mb-3">
                            <label class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        @if (env('RECAPTCHA_MODULE') == 'yes')
                            <div class="form-group mb-3">
                                {!! NoCaptcha::display() !!}
                                @error('g-recaptcha-response')
                                    <span class="small text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        @endif

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block mt-2" id="login_button">Send
                                Password Reset Link</button>
                        </div>


                        <div class="my-4 text-xs text-muted text-center">
                            <p>{{ __('Already have an account?') }} <a
                                    href="{{ route('login', $lang) }}">{{ __('Login') }}</a></p>
                        </div>

                    </div>
                </form>
            </div>
        @endsection
        @push('custom-scripts')
            @if (env('RECAPTCHA_MODULE') == 'yes')
                {!! NoCaptcha::renderJs() !!}
            @endif
        @endpush
    </x-auth-card>
</x-guest-layout>
