<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="{{ __('Search for...') }}" aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Language Switcher-->


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        @if(app()->getLocale() == 'de')
            <li class="nav-item">
                <a href="{{ route(Route::currentRouteName(), 'en') }}" class="nav-link">
                    <img src="{{ asset('flag_en.svg') }}" style="padding-right: 2px" width="20px" height="20px">
                    <span style="color: black">EN</span>
                </a>
            </li>
        @else
            <li class="nav-item">
                <a href="{{ route(Route::currentRouteName(), 'de') }}" class="nav-link">
                    <img src="{{ asset('flag_de.svg') }}" style="padding-right: 2px" width="20px" height="20px">
                    <span style="color: black">DE</span>
                </a>
            </li>
        @endif

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ __('Hi,').' '. Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{ Auth::user()->photo ? asset('img/'.Auth::user()->photo->path) : asset('img/undraw_posting_photo.svg') }}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('admin.profile', app()->getLocale()) }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ __('Profile') }}
                </a>
                <a class="dropdown-item" href="{{ route('admin.profile.edit', app()->getLocale()) }}">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ __('Settings') }}
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout', app()->getLocale()) }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>

    </ul>

</nav>
