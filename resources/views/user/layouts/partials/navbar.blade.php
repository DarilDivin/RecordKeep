@php
    $route = request()->route()->getName();
@endphp
<nav id="navbar">
    <div class="logo">
        <span>D</span>
        <span>S</span>
        <span>I</span>
    </div>
    <div class="nav_menu">
        <ul>
        {{-- <li @class(['list', 'active' => str_contains($route_name, 'statistiques')])> --}}

            <li @class(['nav_links', 'active' => str_contains($route, 'home')])><a href="{{ route('home') }}">Accueil</a></li>
            <li @class(['nav_links', 'active' => str_contains($route, 'document.index')])><a href="{{ route('document.index') }}">Documenthèque</a></li>
            <li class="nav_links">
                <a
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        Logout
                </a>
            </li>

            <form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none">
                @csrf
            </form>
            {{-- <li class="nav_links"><a href="">Demande de prêt</a></li> --}}
            <li class="nav_links"><a href="{{ route('settings') }}"><ion-icon name="settings-outline"></ion-icon></a></li>
        </ul>
    </div>

    <div class="menuHamburger">
        <ion-icon name="menu"></ion-icon>
    </div>
</nav>
