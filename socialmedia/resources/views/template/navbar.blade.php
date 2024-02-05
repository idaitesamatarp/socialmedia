<nav class="navbar navbar-default navbar-fixed-top menu">
    <div class="container">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html"><img src="{{asset('assets/images/logo.png')}}" alt="logo" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right main-menu">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Newsfeed <span><img src="{{asset('assets/images/down-arrow.png')}}" alt="" /></span></a>
                <ul class="dropdown-menu newsfeed-home">
                    <li><a href="/post">Newsfeed</a></li>
                    <li><a href="/follow">People Nearby</a></li>
                    <li><a href="/friend">My friends</a></li>
                    <li><a href="/images">Images</a></li>
                </ul>
            </li>

            <!-- Authentication Links -->
            @guest
            <li class="dropdown">
                <a class="dropdown-toggle" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="dropdown">
                    <a class="dropdown-toggle" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
            @else
                <li class="dropdown">
                    <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }} <span><img src="{{asset('assets/images/down-arrow.png')}}" alt="" /></span>
                    </a>

                    <ul class="dropdown-menu newsfeed-home" aria-labelledby="navbarDropdown">
                        <li class="dropdown"><a href="/profile">My Profile</a></li>
                        <li>
                            <a class="dropdown-toggle" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
        {{-- <form class="navbar-form navbar-right hidden-sm">
        <div class="form-group">
            <i class="icon ion-android-search"></i>
            <input type="text" class="form-control" placeholder="Search friends, photos, videos">
        </div>
        </form> --}}
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>