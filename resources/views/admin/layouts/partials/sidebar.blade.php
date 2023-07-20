@php
    $route_name = request()->route()->getName();
@endphp
<div class="navigation">
    <div class="sidebar-title">
        <span class="icon"><ion-icon name="logo-apple-ar"></ion-icon></span>
        <h3>DashBoard</h3>
    </div>
    <ul>
        <li @class(['list', 'active' => str_contains($route_name, 'statistiques')])>
            <a href="{{ route('dashboard.statistiques') }}">
                <span class="icon"><ion-icon name="stats-chart-outline"></ion-icon></span>
                <span class="title">DashBoard</span>
            </a>
        </li>
        <li @class(['list', 'active' => str_contains($route_name, 'users')])>
            <a href="{{ route('dashboard.users') }}">
                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class="title">Manage Users</span>
            </a>
        </li>
        <li @class(['list', 'active' => str_contains($route_name, 'documents')])>
            <a href="{{ route('dashboard.documents') }}">
                <span class="icon"><ion-icon name="document-text-outline"></ion-icon></span>
                <span class="title">Manage Document</span>
            </a>
        </li>
        <li class="list">
            <a href="#">
                <span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span>
                <span class="title">News</span>
            </a>
        </li>
        <li class="list">
            <a href="{{ route('home') }}">
                <span class="icon"><ion-icon name="laptop-outline"></ion-icon></span>
                <span class="title">User Homepage</span>
            </a>
        </li>
    </ul>
</div>
