@php
    $route_name = request()->route()->getName();
@endphp


<div class="navigation">
    <div class="sidebar-title">
        <span class="icon"><ion-icon name="logo-apple-ar"></ion-icon></span>
        <h3>DashBoard</h3>
    </div>
    <ul>
        <li @class(['list', 'active' => str_contains($route_name, 'document')])>
            <a href="{{ route('manager.document') }}">
                <span class="icon"><ion-icon name="document-text-outline"></ion-icon></span>
                <span class="title">Manage Document</span>
            </a>
        </li>
        <li @class(['list', 'active' => str_contains($route_name, 'folder')])>
            <a href="{{ route('manager.folder') }}">
                <span class="icon"><ion-icon name="folder"></ion-icon></span>
                <span class="title">Manage Folders</span>
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
