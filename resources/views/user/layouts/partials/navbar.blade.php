@php
    $route = request()->route()->getName();
@endphp
<nav id="navbar" class="" x-data="{ isNavDropdownContainerOpen: false }">
    <div class="logo">
        {{-- <span>D</span>
        <span>S</span>
        <span>I</span> --}}
        {{-- <img src="storage/images/Logo-recordkeep-white.png" alt="" class="white">
        <img src="storage/images/Logo-recordkeep-black.png" alt="" class="black"> --}}
        <img src="storage/images/RecordKeepFichier 7.svg" alt="" class="white">
        <img src="storage/images/RecordKeepFichier 8.svg" alt="" class="black">
    </div>
    <div class="nav_menu">
        <ul>

            <li @class(['nav_links', 'active' => str_contains($route, 'home')])><a href="{{ route('home') }}">Accueil</a></li>

            <li @class(['nav_links', 'active' => str_contains($route, 'document.index')])><a href="{{ route('document.index') }}">Documenthèque</a></li>
            @auth
                <li @class(['nav_links', 'active' => str_contains($route, 'settings')])><a href="{{ route('settings') }}">Paramètres</a></li>
            @endauth
            <li @class(['nav_links', 'active' => str_contains($route, 'contactUs')])><a href="{{ route('contactUs') }}"> Nous contacter </a></li>

            @auth
                <form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none">
                    @csrf
                </form>
            @endauth


        </ul>

        @auth
            <div class="profil_user" @click="isNavDropdownContainerOpen = !isNavDropdownContainerOpen">
                <div class="profil">
                    <ion-icon name="person-circle-outline"></ion-icon>
                </div>
                <div class="profil_username">
                    <p>{{ Auth::user()->prenoms . ' ' . strtoupper(Auth::user()->nom ) }}</p>
                </div>
            </div>
        @endauth
    </div>

    <div class="navDropdownContainer" x-show="isNavDropdownContainerOpen" x-cloak>
        <div class="navDropdownItem logoutLink">
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <ion-icon name="log-out-outline"></ion-icon>
                <p>Logout</p>
            </a>
        </div>

        <div class="navDropdownItem dashboardLink">
            <a href="{{ route('admin.statistique') }}">
                <ion-icon name="analytics-outline"></ion-icon>
                <p>Dashboard</p>
            </a>
        </div>

    </div>

    <div class="menuHamburger">
        <ion-icon name="menu"></ion-icon>
    </div>
</nav>
