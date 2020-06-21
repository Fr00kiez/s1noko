<nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: #272A2E ">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/s1noko2.png" width="55" height="55">
        </a>
        <a
            class="font-weight-bold text-white px-2 py-2"
            style="font-size: 26px;"
        >
            S1Noko
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto" >
                <li class="nav-item">
                    <a class="nav-link font-weight-bold px-3 py-2" href="#">Jelajah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold px-3 py-2 " href="#">Unggah</a>
                </li>

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold btn btn-primary px-4 py-2 rounded-pill" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>

                @else`

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
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>