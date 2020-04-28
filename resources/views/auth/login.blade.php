@extends('layouts.outdoor')

@section('page-title')
 Login
@endsection

@section('main-content')

<div class="row justify-content-center">

<div class="col-xl-10 col-lg-12 col-md-9">

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
        <div class="col-lg-6">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h2 text-gray-900 mb-4"><b>myInsider</b></h1>
              <h2 class="h4 text-gray-900 mb-4">{{ __('auth.Login') }}</2>
            </div>
            <form class="user" method="POST" action="{{ route('login') }}">
                @csrf
              <div class="form-group">
                
                <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('auth.enter-email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
            </div>

              <div class="form-group">
                
                <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required placeholder="{{ __('auth.enter-pass') }}" autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            
            <button type="submit" class="btn btn-primary btn-user btn-block">
                {{ __('auth.Login') }}             
            </button>

              
            </form>
            <hr>
            <div class="text-center">
              
                @if (Route::has('password.request'))
                    <a class="small" href="{{ route('password.request') }}">
                        {{ __('auth.Forgot Your Password?') }}
                    </a>
                @endif
            </div>
            <div class="text-center">
              <a class="small" href="{{ route('register') }}">{{ __('auth.Create an Account!') }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

</div>

@endsection
