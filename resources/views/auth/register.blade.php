@extends('layouts.outdoor')

@section('page-title')
    Register
@endsection

@section('main-content')


<div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
              <h1 class="h2 text-gray-900 mb-4"><b>myInsider</b></h1>
                <h2 class="h4 text-gray-900 mb-4">{{ __('auth.Register') }}</h2>
              </div>
              <form class="user" method="POST" action="{{ route('register') }}">
                @csrf
                
                <!-- First and last name row -->
                <div class="form-group row">

                 <div class="col-sm-4 mb-3 mb-sm-0">
                    
                
                    

                    <select name="title" id="title"  style="padding:0 1rem;height:3rem" class="form-control form-control-user @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                      <option  value="Mr" selected>{{ __('auth.Mr') }}</option>
                      <option value="Ms">{{ __('auth.Ms') }}</option>
                      <option value="Mr Dr">{{ __('auth.Mr Dr') }}</option>
                      <option value="Ms Dr">{{ __('auth.Ms Dr') }}</option>
                      
                    </select>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  
                  </div>
                  
                  <div class="col-sm-4">
                    
                
                    <input id="first_name" type="text" class="form-control form-control-user @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required placeholder="{{ __('auth.First Name') }}" autocomplete="first_name" autofocus>

                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  
                  </div>

                  <div class="col-sm-4">
                  
                  <input id="last_name" type="text" class="form-control form-control-user @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required placeholder="{{ __('auth.Last Name') }}" autocomplete="last_name" autofocus>

                  @error('last_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  </div>

                </div>

                <!-- Company_name and phone number row -->
                <div class="form-group row">
                  
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    
                
                    <input id="company_name" type="text" class="form-control form-control-user @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required placeholder="{{ __('auth.Company Name') }}" autocomplete="company_name" autofocus>

                    @error('company_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  
                  </div>

                  <div class="col-sm-6">
                  
                  <input id="mobile_number" type="text" class="form-control form-control-user @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ old('mobile_number') }}" required placeholder="{{ __('auth.Mobile Number') }}" autocomplete="mobile_number" autofocus>

                  @error('mobile_number')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  </div>

                </div>

                
                
            
            
               
               
                <div class="form-group">
                  
                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="{{ __('auth.enter-email') }}" autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
                
                <div class="form-group row">
                  
                <div class="col-sm-6 mb-3 mb-sm-0">
                   
                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="{{ __('auth.enter-pass') }}" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                  
                  <div class="col-sm-6">
                    

                    <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required placeholder="{{ __('auth.Confirm Password') }}" autocomplete="new-password">

                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('auth.Register as client') }} 
                </button>
                <hr>
               
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="{{ route('login') }}">{{ __('auth.Already have an account? Login!') }}</a>
              </div>
              <div class="text-center">
                <a class="small" href="{{ route('password.request') }}">{{ __('auth.Forgot Your Password?') }}</a>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection
