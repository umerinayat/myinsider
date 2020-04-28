@extends('layouts.master')

@section('page-title')
Update {{ $client->user->first_name .' '. $client->user->last_name }} Data
@endsection

@section('extra-head')
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

<!-- DataTales Clients -->
<div class="card shadow mb-4">

    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h4 mb-0 text-gray-800">Update Client</h1>
            <a href="{{ route('clients.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-users fa-sm"></i>
                </span>
                <span class="text"> All Clients </span>
            </a>
        </div>
    </div>


    <div class="card-body">
        <div class="row">
            <div class="col-lg-5"></div>
        </div>
        <form class="user" method="POST" action="{{ route('clients.update', ['client' => $client->id]) }}">
            
            @method('PUT')
            @csrf
            @include('clients.fields')

            <button type="submit" class="btn btn-primary btn-user btn-block">
                Update Client
            </button>
            <hr>

        </form>
    </div>
</div>


@endsection

@section('extra-script')
    <script>
        $(".c-select").select2({
            placeholder: "Select Country",
            allowClear: true,
        });
    </script>
@endsection