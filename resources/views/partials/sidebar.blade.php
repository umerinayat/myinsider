<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-eye"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> myInsider </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>{{ __('dashboard.Dashboard') }}</span></a>
      </li>


     <!-- Admin Controlled Routes -->
      <!-- Divider -->
      <hr class="sidebar-divider">

      @can('is_admin')
      <!-- Heading -->
      <div class="sidebar-heading">
        {{__('navbar.Admin')}}
      </div>

      <!-- Nav Item - Pages Collapse Menu -->

    
      <!-- viewAdmins -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admins" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>{{ __('navbar.menuAdmin') }}</span>
        </a>
        <div id="admins" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{ __('navbar.Manage') }}: </h6>
            <a class="collapse-item" href="{{ route('viewAdmins') }}">{{ __('navbar.All') }}</a>
            <a class="collapse-item" href="{{ route('createAdmin') }}">{{__('navbar.Add')}}</a>
          </div>
        </div>
      </li>

     
     
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>{{ __('navbar.Clients') }}</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{ __('navbar.Manage') }}: </h6>
            <a class="collapse-item" href="{{ route('clients.index') }}">{{ __('navbar.All') }}</a>
            <a class="collapse-item" href="{{ route('clients.create') }}">{{__('navbar.Add')}}</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

    @endcan

      <!-- Clients and admin Controlled Route -->
      
      @can('is_clientOrAdmin')
      <!-- Heading -->
      <div class="sidebar-heading">
        {{__('navbar.Client')}}
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Insiders-cc-routes" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>{{ __('navbar.Insiders') }}</span>
        </a>
        <div id="Insiders-cc-routes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{ __('navbar.Manage') }}: </h6>
            <a class="collapse-item" href="{{ route('insiders.index') }}">{{ __('navbar.All') }}</a>
            <a class="collapse-item" href="{{ route('insiders.create') }}">{{__('navbar.Add')}}</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#projects-route" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-project-diagram"></i>
          <span>{{ __('navbar.Projects') }}</span>
        </a>
        <div id="projects-route" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{ __('navbar.Manage') }}:</h6>
            <a class="collapse-item" href="{{ route('projects.index') }}">{{ __('navbar.All') }}</a>
            <a class="collapse-item" href="{{ route('projects.create') }}">{{ __('navbar.Create New Project') }}</a>
          </div>
        </div>
      </li>
      @endcan

    @can('is_insider')
    <!-- insider control routes -->
    <div class="sidebar-heading">
         {{ __('navbar.Insider Profile') }}
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Insiders-routes" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>{{ __('navbar.My Profile') }}</span>
        </a>
        <div id="Insiders-routes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{ __('navbar.Manage') }}: </h6>
            <a class="collapse-item" href="{{ route('showInsiderInfo') }}">{{ __('labels.View') }}</a>
            <a class="collapse-item" href="{{ route('insiderEditInfo') }}">{{ __('labels.Edit') }}</a>
          
          </div>
        </div>
      </li>

      @endcan

     
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>