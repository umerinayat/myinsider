@extends('layouts.master')

@section('page-title')
{{ __('labels.Update') }} {{ $insider->first_name .' '. $insider->last_name }} Data
@endsection

@section('extra-head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .select2-selection__rendered {
            line-height: 35px !important;
        }
        .select2-container .select2-selection--single {
            height: 37px !important;
        }
        .select2-selection__arrow {
            height: 34px !important;
        }
    </style>
@endsection

@section('main-content')

<!-- DataTales insiders -->
<div class="card shadow mb-4">

    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h4 mb-0 text-gray-800">{{ __('labels.Update Insider') }}</h1>
            @can('is_clientOrAdmin')
            <a href="{{ route('insiders.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-users fa-sm"></i>
                </span>
                <span class="text"> {{ __('labels.All Insiders') }} </span>
           
            </a>
            @endcan
        </div>
    </div>


    <div class="card-body">
        <div class="row">
            <div class="col-lg-5"></div>
        </div>

        
        @can('is_clientOrAdmin')
        <form class="user" method="POST"  action="{{ route('insiders.update', ['insider' => $insider->id]) }}">
        @endcan 

        @can('is_insider')
        <form class="user" method="POST"  action="{{ route('insiderUpdateInfo') }}">
        @endcan 

            @method('PUT')
            @csrf
            @include('insiders.fields')

            
            <button type="submit" class="btn btn-primary btn-user btn-block">
                {{ __('labels.Update Insider') }}
            </button>
            
            
            <hr>

        </form>
    </div>
</div>


@endsection

@section('extra-script')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/de.js"></script>
    <script>
        $(".c-select").select2({
            placeholder: "Select Country",
            allowClear: true,
        });

        var appLocale = $('#appLocale').val();

        var dateFormat = 'd-m-Y';
        var altFormat = 'd. F Y';

        if (appLocale === 'en') {
            dateFormat = 'Y-m-d';
            altFormat = 'Y, F j';
        } else if (appLocale === 'de') {
            dateFormat = 'd-m-Y';
            altFormat = 'd. F Y';
        }

        $(".datep").flatpickr({
            locale: "{{ str_replace('_', '-', app()->getLocale()) }}",
            altInput: true,
            altFormat: altFormat,
            dateFormat: dateFormat,
        });

        
    </script>
@endsection