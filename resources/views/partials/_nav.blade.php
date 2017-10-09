<header>
    <nav>
        <div class="navbar-fixed">
            <a href="{{route('posts.index')}}" class="brand-logo"><img alt="Logo" src="/images/logo.png" width="59"/></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="{{route('posts.index')}}">Posts</a></li>
                <li><a href="{{route('posts.create')}}">Write</a></li>
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li>
                        <a href="#" class="dropdown-button" data-activates="dropdown1">
                            {{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>
                @endif
            </ul>
            <ul id="dropdown1" class="dropdown-content">
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </ul>
        </div>
    </nav>
</header>