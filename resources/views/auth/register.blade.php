 @extends('layouts.guest')

 @section('title')
     {{ __('Register') }}
 @endsection

 @section('language-bar')
     <li class="dropdown dash-h-item drp-language login_drp_language">
         <a class="dash-head-link dropdown-toggle arrow-none me-1" data-bs-toggle="dropdown" href="#" role="button"
             aria-haspopup="false" aria-expanded="false">
             <i class="ti ti-world nocolor"></i>
             <span class="drp-text">{{ Str::ucfirst($language_name->fullname) }}</span>
             <i class="ti ti-chevron-down drp-arrow nocolor"></i>
         </a>
         <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
             @foreach (App\Models\Utility::languages() as $code => $language)
                 <a href="{{ route('register', $code) }}" class="dropdown-item {{ $lang == $code ? 'text-primary' : '' }}">
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
         @if (session('status'))
             <div class="mb-4 font-medium text-lg text-green-600 text-danger">
                 {{ __('Email SMTP settings does not configured so please contact to your site admin.') }}
             </div>
         @endif
         <div class="">
             <h2 class="mb-3 f-w-600">{{ __('Register') }}</h2>
         </div>
         <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="">
             @csrf
             <div class="">
                 <div class="form-group mb-3">
                     <label class="form-label">{{ __('Name') }}</label>
                     <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                         name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                         placeholder="Enter your name">
                     @error('name')
                         <span class="error invalid-name text-danger" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                 </div>

                 <div class="form-group mb-3">
                     <label class="form-label">{{ __('Store Name') }}</label>
                     <input id="store_name" type="text" class="form-control @error('store_name') is-invalid @enderror"
                         name="store_name" value="{{ old('store_name') }}" required autocomplete="store_name"
                         placeholder="Enter your store name">
                     @error('store_name')
                         <span class="error invalid-name text-danger" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                 </div>

                 <div class="form-group mb-3">
                     <label class="form-label">{{ __('Email') }}</label>
                     <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror"
                         name="email" value="{{ old('email') }}" required placeholder="Enter your email">
                     @error('email')
                         <span class="error invalid-email text-danger" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                 </div>

                 <div class="form-group mb-3">
                     <label class="form-label">{{ __('Password') }}</label>
                     <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror"
                         name="password" required autocomplete="new-password" placeholder="Enter your password">
                     @error('password')
                         <span class="error invalid-password text-danger" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                 </div>

                 <div class="form-group">
                     <label class="form-label">{{ __('Confirm password') }}</label>
                     <input id="password-confirm" type="password"
                         class="form-control @error('password_confirmation') is-invalid @enderror"
                         name="password_confirmation" required autocomplete="new-password"
                         placeholder="Enter confirm password">
                     @error('password_confirmation')
                         <span class="error invalid-password_confirmation text-danger" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                 </div>

                 {{-- <div class="form-group mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        {{ __('I accept the') }} <a href="#!"> {{ __('Term & condition') }}</a>
                                    </label>
                                </div>
                            </div> --}}

                 @if (env('RECAPTCHA_MODULE') == 'yes')
                     <div class="form-group col-lg-12 col-md-12 mt-3">
                         {!! NoCaptcha::display() !!}
                         @error('g-recaptcha-response')
                             <span class="error small text-danger" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                 @endif
                 <div class="d-grid">
                     <button class="btn btn-primary btn-block mt-2" type="submit">{{ __('Register') }}</button>
                 </div>

                 <div class="my-4 text-xs text-muted text-left">
                     <p>
                         {{ __('Already have an account?') }} <a
                             href="{{ route('login', $lang) }}">{{ __('Sign in') }}</a>
                     </p>
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
