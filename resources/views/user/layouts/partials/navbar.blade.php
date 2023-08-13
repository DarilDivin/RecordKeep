@php
    $route = request()->route()->getName();
@endphp
<nav>
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
            {{-- <li class="nav_links"><a href="">Demande de prêt</a></li> --}}
            {{-- <li class="nav_links"><a href=""><ion-icon name="settings-outline"></ion-icon></a></li> --}}
        </ul>
    </div>

    <div class="menuHamburger">
        <ion-icon name="menu"></ion-icon>
    </div>
</nav>
