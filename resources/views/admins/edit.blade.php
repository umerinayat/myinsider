@extends('layouts.master')

@section('page-title')
{{ __('labels.Update Admin') }}
@endsection

@section('extra-head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('main-content')

<!-- DataTales projects -->
<div class="card shadow mb-4">

    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h4 mb-0 text-gray-800">{{ __('labels.Update Admin') }}</h1>
            <a href="{{ route('viewAdmins') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-users fa-sm"></i>
                </span>
                <span class="text"> {{ __('labels.All Admins') }} </span>
            </a>
        </div>
    </div>


    <div class="card-body">
        <div class="row">
            <div class="col-lg-5"></div>
        </div>
        <form class="user" method="POST" action="{{ route('updateAdmin', ['id' => $admin->id]) }}">
            
            @method('PUT')
            @csrf
            @include('admins.fields')

        
            <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('labels.Update Admin') }}
            </button>
            <hr>

        </form>
    </div>
</div>


@endsection

@section('extra-script')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script> 
       

 


    
        

    </script>
@endsection