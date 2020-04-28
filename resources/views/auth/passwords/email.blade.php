@extends('layouts.outdoor')

@section('page-title')
    Forgot Your Password?
@endsection

@section('main-content')


<div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">{{ __('auth.Forgot Your Password?') }}</h1>
                    <p class="mb-4">{{ __('auth.enter-your-email-para') }}</p>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                </div>
                  <form class="user" method="POST" action="{{ route('password.email') }}">
                    @csrf  
                    <div class="form-group">
                      
                      <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="{{ __('auth.enter-email') }}" autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    
                        
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        {{ __('auth.Send Password Reset Link') }}
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="{{ route('register') }}">{{ __('auth.Create an Account!') }}</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="{{ route('login') }}">{{ __('auth.Already have an account? Login!') }}</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

@endsection
