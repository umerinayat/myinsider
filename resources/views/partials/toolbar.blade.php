<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

      
  

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


          <form id="set-locale-form" action="{{ route('setAppLocale') }}" method="POST" class="form-inline my-2 my-lg-0">
            @csrf
            @php $locale = session()->get('locale') ?? ''; @endphp

            <select style="width:90px;height:35px;font-size:16px;display:inline-block" id="locale" name="locale" class="form-control">
              <option value="en" {{  $locale == 'en' ? 'selected' : '' }}>EN</option>
              <option value="de" {{  $locale == 'de' ? 'selected' : '' }}>DE</option>
            </select>
          </form>


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }} </span>
                <!-- <img class="img-profile rounded-circle" src="{{ asset('images/avatar.png') }}"> -->
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              
               
                <a class="dropdown-item" href="{{ route('logout') }}" 
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  {{ __('auth.Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                
              </div>
            </li>

          </ul>

        </nav>