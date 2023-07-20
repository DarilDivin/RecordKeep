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
            <li class="nav_links"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="nav_links"><a href="{{ route('user.documents') }}">Documents</a></li>
            <li class="nav_links"><a href="{{ route('user.folder') }}">Dossiers</a></li>
            <li class="nav_links"><a href="{{ route('user.demandePret') }}">Demande de prêt</a></li>
            <li class="nav_links"><a href="Settings.html"><ion-icon name="settings-outline"></ion-icon></a></li>
        </ul>
    </div>

    <div class="menuHamburger">
        <ion-icon name="menu"></ion-icon>
    </div>
</nav>
