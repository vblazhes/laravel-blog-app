{{--<nav class="navbar navbar-expand navbar-dark bg-dark">--}}
{{--    <a class="navbar-brand" href="#">Blog App</a>--}}
{{--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--        <span class="navbar-toggler-icon"></span>--}}
{{--    </button>--}}

{{--    <div class="collapse navbar-collapse" id="navbarsExample02">--}}
{{--        <ul class="navbar-nav mr-auto">--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="/about">About</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="/services">Services</a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="/posts" class="nav-link">Blogs</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <ul class="nav navbar-nav  navbar-right">'--}}
{{--            <li>--}}
{{--                <a href="/posts/create" class="nav-link">Create Post</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</nav>--}}
{{--<br>--}}

<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
{{--            {{ config('app.name', 'Laravel') }}--}}
            BlogApp
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{request()-> is('/') ? 'active' : ''}}">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{request()-> is('about') ? 'active' : ''}}">
                    <a class="nav-link" href="/about">About</a>

                </li>
                <li class="nav-item {{request()-> is('services') ? 'active' : ''}}">
                    <a class="nav-link" href="/services">Services</a>
                </li>
{{--                <li>--}}
{{--                    <a href="/posts" class="nav-link">Blogs</a>--}}
{{--                </li>--}}
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <a class="dropdown-item" href="/dashboard">Dashboard</a>

                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<br>
