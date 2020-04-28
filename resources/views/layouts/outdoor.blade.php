<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ config('app.name', 'myInsider') }} - @yield('page-title')</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

  @yield('extra-head')

</head>

<body class="bg-gradient-primary">

  <input type="hidden" id="appLocale" value="{{ str_replace('_', '-', app()->getLocale()) }}">

  <div class="container">

    <!-- select language locale  -->
    <form id="set-locale-form" class="mt-4" action="{{ route('setAppLocale') }}" method="POST">
      @csrf
     <div class="form-group row">

     <div class="col-sm-1 offset-sm-11">

     @php $locale = session()->get('locale') ?? ''; @endphp

      <select style="width:90px;height:35px;font-size:16px;display:inline-block" id="locale" name="locale" class="form-control">
          <option value="en" {{  $locale == 'en' ? 'selected' : '' }}>EN</option>
          <option value="de" {{  $locale == 'de' ? 'selected' : '' }}>DE</option>
        </select>
     </div>

    
     </div>

    </form>

    <!-- Main Content Outer Row -->
  
    @yield('main-content')
  
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

  <script> 

      var locale = $('#locale');

      locale.on('change', function (evt) {
          evt.preventDefault();
          console.log($(this).val());

          document.getElementById('set-locale-form').submit();

          return false;
      });

  </script>

  @yield('extra-script')

</body>

</html>
