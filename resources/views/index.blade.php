@extends('layouts.master')

@section('page-title')
    Dashboard
@endsection

@section('main-content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">{{ __('dashboard.Dashboard') }}</h1>
 
</div>

<!-- Content Row -->
<div class="row">

  <!-- total clients -->
  @can('is_admin')
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ __('dashboard.TOTAL CLIENTS') }}</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $clientsCount ?? '' }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endcan

    <!-- Total Insiders -->
    <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{ __('dashboard.TOTAL INSIDERS') }}</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $insidersCount ?? '' }}</div>
              </div>
              
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Total Projects -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{ __('dashboard.TOTAL PROJECTS') }}</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $projectsCount }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-project-diagram fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Content Row -->

</div>
<!-- /.container-fluid -->

@endsection