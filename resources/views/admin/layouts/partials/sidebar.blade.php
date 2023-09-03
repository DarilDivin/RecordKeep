@php
    $route_name = request()->route()->getName();
    // @dd($route_name)
@endphp
<div class="navigation locked">
    <div class="sidebar-title">
        <div class="lock_container">
            <span class="lock close"><ion-icon name="lock-closed-outline"></ion-icon></span>
            <span class="lock open"><ion-icon name="lock-open-outline"></ion-icon></span>
        </div>
        <div class="OC-btn">
            <span class="oc_btn close">
                <ion-icon name="chevron-back-outline" id="sidebar-close"></ion-icon>
            </span>
            <span class="oc_btn open">
                <ion-icon name="chevron-forward-outline" id="sidebar-open"></ion-icon>
            </span>
        </div>
        <h3 class="title">Tableau de bord</h3>
    </div>
    <ul>
        <li @class(['list', 'active' => str_contains($route_name, 'statistique')])>
            <a href="{{ route('admin.statistique') }}">
                <span class="icon"><ion-icon name="stats-chart-outline"></ion-icon></span>
                <span class="title">Statistiques</span>
            </a>
        </li>

        <li @class(['list', 'active' => str_contains($route_name, 'user')])>
            <a href="{{ route('admin.user.index') }}">
                <span class="icon"><ion-icon name="people"></ion-icon></span>
                <span class="title">Utilisateurs</span>
            </a>
        </li>

        <li @class(['list', 'active' => str_contains($route_name, 'document')])>
            <a href="{{ route('admin.document.index') }}">
                <span class="icon"><ion-icon name="document-text-outline"></ion-icon></span>
                <span class="title">Documents</span>
            </a>
        </li>

        <li class="list">
            <a href="#">
                <span class="icon"><ion-icon name="arrow-redo"></ion-icon></span>
                <span class="title">Demande de transfert</span>
            </a>
        </li>

        <li class="list">
            <a href="#">
                <span class="icon"><ion-icon name="swap-horizontal"></ion-icon></span>
                <span class="title">Demande de Prêt</span>
            </a>
        </li>

        <li class="list">
            <a href="{{ route('home') }}">
                <span class="icon"><ion-icon name="laptop-outline"></ion-icon></span>
                <span class="title">Page d'accueil Utilisateur</span>
            </a>
        </li>

        <li class="list">
            <a href="#" class="moreOptions">
                <span class="icon"><ion-icon name="add"></ion-icon></span>
                <span class="title">Plus d'options</span>
            </a>
        </li>
    </ul>

    <div class="user_profil" title="Utilisateur: Régis AISSI">
        <div class="profil">
            <ion-icon name="person-circle-outline"></ion-icon>
        </div>
        <div class="profil_username">
            <p>Régis AISSI</p>
        </div>
    </div>
</div>
