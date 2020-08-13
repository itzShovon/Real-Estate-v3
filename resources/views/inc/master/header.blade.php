<header class="main-header " id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg">
        <!-- Sidebar toggle button -->
        <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
        </button>
        <!-- search form -->
        <div class="search-form d-none d-lg-inline-block"></div>
        <div class="navbar-right ">
            <ul class="nav navbar-nav">
                <!-- User Account -->
                <li class="dropdown user-menu">
                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <img src="{{url('/')}}/storage/{{auth()->user()->avatar}}" class="user-image" alt="Avatar" />
                        <span class="d-none d-lg-inline-block">{{auth()->user()->name}}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <!-- User image -->
                        <li class="">
                            <a href="{{url('/users')}}/{{ Auth::user()->id }}/edit" data-toggle="tooltip" title="Want to modify profile?">
                                <i class="mdi mdi-account-settings"></i> Profile
                            </a>
                        </li>
                        <li class="dropdown-footer" data-toggle="tooltip" title="Want to get out of here! Keep forwarding...">
                            {{-- <a href="{{url('/logout')}}"> <i class="mdi mdi-logout"></i> Log Out </a> --}}
                            <a href="#"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                 <i class="mdi mdi-logout"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
