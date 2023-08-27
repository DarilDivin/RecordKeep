@php
    $route_name = request()->route()->getName();
    // @dd($route_name)
@endphp
<div class="navigation">
    <div class="sidebar-title">
        <span class="icon"><ion-icon name="logo-apple-ar"></ion-icon></span>
        <h3>DashBoard</h3>
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
                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
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
                <span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span>
                <span class="title">Infos</span>
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
</div>
