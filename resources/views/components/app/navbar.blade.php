<nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: #3490dc;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/s1noko2.png" width="45" height="45" alt="S1noko logo"/>
            <span class="font-weight-bold px-2 py-2">S1Noko</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav align-items-center ml-auto">
                <li class="nav-item">
                    <a class="nav-link nav-uppercase px-3 py-2" href="#">Jelajah</a>
                </li>

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a href="#ask-login-modal" class="nav-link nav-uppercase px-3 py-2" data-toggle="modal">
                            Unggah
                        </a>
                    </li>

                    <li class="nav-item mx-3">
                        <a class="btn btn-light rounded-pill nav-uppercase px-3 py-2" href="{{ route('login') }}">
                            <span class="px-1">{{ __('Login') }}</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item mx-3">
                        <button type="button" class="btn btn-light rounded-pill nav-uppercase px-3 py-2" data-toggle="modal"
                                data-target="#create-post-modal">
                            <span class="px-1">Unggah Karya</span>
                        </button>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link nav-uppercase dropdown-toggle d-flex align-items-center" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Akun Saya
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu py-0 dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item d-flex align-items-center px-3 py-2 border-bottom" href="#!" style="width: 250px;">
                                <img src="/avatar.png" alt="User Avatar" height="50px" class="d-block rounded-circle mr-2">
                                <div>
                                    <h6 class="font-weight-bold mb-1">{{ auth()->user()->name }}</h6>
                                    <p class="font-italic mb-0">{{ ucfirst(auth()->user()->type) }}</p>
                                </div>
                            </a>

                            @admin
                            <a class="dropdown-item p-3" href="{{ route('admin.dashboard') }}">
                                Admin Panel
                            </a>
                            @endif

                            <a class="dropdown-item p-3" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
