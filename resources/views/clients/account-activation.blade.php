@extends('layouts.outdoor')

@section('page-title')
Account Activation
@endsection

@section('main-content')

<div class="row justify-content-center">

<div class="col-xl-10 col-lg-12 col-md-9">

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
       
        <div class="col-lg-12">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h2 text-gray-900 mb-4"><b>MyInsider</b></h1>
              <h2 class="h4 text-gray-900 mb-4">{{ __('auth.Your account is not activated yet') }}</2>
            </div>
           
            
            <p style="font-size:17px" class="text-center">
                {{ __('auth.Your application is under review', [ 'userEmail' => $user->email] ) }} 
            </p>

            <div>
               <a class="nav-link" href="{{ route('logout') }}" 
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  {{ __('auth.Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

</div>

@endsection
