@php
    $route = request()->route()->getName();
@endphp
<nav id="navbar" class="">
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

            <li class="nav_links"><a href="{{ route('settings') }}">Paramètres</a></li>

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
        </ul>

        <div class="profil_user">
            <div class="profil">
                <ion-icon name="person-circle-outline"></ion-icon>
            </div>
            <div class="profil_username">
                <p>{{ Auth::user()->nom }}</p>
            </div>
        </div>
    </div>

    <div class="menuHamburger">
        <ion-icon name="menu"></ion-icon>
    </div>
</nav>
