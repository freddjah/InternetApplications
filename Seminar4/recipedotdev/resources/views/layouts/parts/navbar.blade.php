<nav class="navbar navbar-expand-lg navbar-dark default-bg">

    <a class="navbar-brand text-white mx-auto" href="{{ route('home') }}">Recipe.dev</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse ml-3" id="navbarNav">
        <ul class="navbar-nav">

            <li class="nav-item @if(Request::path() == '/')active @endif">
                <a class="nav-link nav-link-whitefade" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item @if(Request::path() == 'calendar')active @endif">
                <a class="nav-link nav-link-whitefade" href="{{ route('calendar') }}">Calendar</a>
            </li>

            <li class="nav-item @if(Request::path() == 'recipe')active @endif">
                <a class="nav-link nav-link-whitefade" href="{{ route('recipes') }}">Recipes</a>
            </li>

        </ul>

        <hr class="collapsed-menu-seperator">

        <ul class="nav navbar-nav ml-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link nav-link-whitefade" href="{{ route('login') }}">Log in</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-whitefade" href="{{ route('register') }}">Register</a>
                </li>
            @else
                <li class="navbar-text text-white">
                    Logged in as {{ Auth::user()->name }}
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-whitefade" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endguest


        </ul>
    </div>
</nav>