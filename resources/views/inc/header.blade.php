<!-- Header -->
<header id="header">
    <div class="logo"><a href="{{ route('home') }}">{{ config('app.name', 'Laravel') }} <span>by Zohra</span></a></div>
    <a href="#menu">Menu</a>
</header>

<!-- Nav -->
<nav id="menu">
    <ul class="links">
        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            @if (Route::has('register'))
                <li><a href="{{ route('register') }}">Register</a></li>
            @endif
        @else
            <li><img class="col-12" src="{{url('/')}}/storage/{{auth()->user()->avatar}}" alt="" srcset=""></li>
            <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
            <li><a href="{{url('/posts/create')}}">New Post</a></li>
            <li><a href="{{url('/users')}}/{{ Auth::user()->id }}/edit">Profile</a></li>
            <li>
                <a href="#"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @endguest


        <li><a href="{{url('/posts')}}">Posts</a></li>
        <li><a href="{{url('/search')}}">Search</a></li>
        <li><a href="{{url('/about')}}">About</a></li>
    </ul>
</nav>
