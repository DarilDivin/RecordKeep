@php
    $route_name = request()->route()->getName();
@endphp
<div class="navigation locked close">
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
        @hasallroles(['Administrateur', 'Gestionnaire-Central'])
            <li @class(['list', 'active' => str_contains($route_name, 'statistique')])>
                <a href="{{ route('admin.statistique') }}">
                    <span class="icon"><ion-icon name="stats-chart-outline"></ion-icon></span>
                    <span class="title">Statistiques</span>
                </a>
            </li>
        @endhasallroles

        @hasrole('Administrateur')
            <li @class(['list', 'active' => str_contains($route_name, 'user')])>
                <a href="{{ route('admin.user.index') }}">
                    <span class="icon"><ion-icon name="people"></ion-icon></span>
                    <span class="title">Utilisateurs</span>
                </a>
            </li>
        @endhasrole

        @hasrole('Administrateur')
            <li @class(['list', 'active' => str_contains($route_name, 'fonction')])>
                <a href="{{ route('admin.fonction.index') }}">
                    <span class="icon"><ion-icon name="briefcase-outline"></ion-icon></span>
                    <span class="title">Fonctions</span>
                </a>
            </li>
        @endhasrole

        @hasrole('Administrateur')
            <li @class(['list', 'active' => str_contains($route_name, 'role')])>
                <a href="{{ route('admin.role.index') }}">
                    <span class="icon"><ion-icon name="git-compare-outline"></ion-icon></span>
                    <span class="title">Rôles</span>
                </a>
            </li>
        @endhasrole

        @hasrole('Administrateur')
            <li @class(['list', 'active' => str_contains($route_name, 'direction')])>
                <a href="{{ route('admin.direction.index') }}">
                    <span class="icon"><ion-icon name="business-outline"></ion-icon></span>
                    <span class="title">Directions</span>
                </a>
            </li>
        @endhasrole

        @hasrole('Administrateur')
            <li @class(['list', 'active' => str_contains($route_name, 'service')])>
                <a href="{{ route('admin.service.index') }}">
                    <span class="icon"><ion-icon name="business-outline"></ion-icon></span>
                    <span class="title">Services</span>
                </a>
            </li>
        @endhasrole

        @hasrole('Administrateur')
            <li @class(['list', 'active' => str_contains($route_name, 'division')])>
                <a href="{{ route('admin.division.index') }}">
                    <span class="icon"><ion-icon name="business-outline"></ion-icon></span>
                    <span class="title">Divisions</span>
                </a>
            </li>
        @endhasrole

        @hasrole('Gestionnaire-Standard')
            <li @class(['list', 'active' => str_contains($route_name, 'document')])>
                <a href="{{ route('manager.document.index') }}">
                    <span class="icon"><ion-icon name="document-text-outline"></ion-icon></span>
                    <span class="title">Documents</span>
                </a>
            </li>
        @endhasrole

        @hasrole('Gestionnaire-Standard')
            <li @class(['list', 'active' => str_contains($route_name, 'categorie')])>
                <a href="{{ route('manager.categorie.index') }}">
                    <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                    <span class="title">Catégories</span>
                </a>
            </li>
        @endhasrole

        @hasrole('Gestionnaire-Standard')
            <li @class(['list', 'active' => str_contains($route_name, 'nature')])>
                <a href="{{ route('manager.nature.index') }}">
                    <span class="icon"><ion-icon name="documents-outline"></ion-icon></span>
                    <span class="title">Nature de Documents</span>
                </a>
            </li>
        @endhasrole

        @hasrole('Gestionnaire-Standard')
            <li @class(['list', 'active' => str_contains($route_name, 'rayon')])>
                <a href="{{ route('manager.rayon.index') }}">
                    <span class="icon"><ion-icon name="file-tray-stacked-outline"></ion-icon></span>
                    <span class="title">Rayons de Rangement</span>
                </a>
            </li>
        @endhasrole

        @hasrole('Gestionnaire-Standard')
            <li @class(['list', 'active' => str_contains($route_name, 'boite')])>
                <a href="{{ route('manager.boite.index') }}">
                    <span class="icon"><ion-icon name="file-tray-full-outline"></ion-icon></span>
                    <span class="title">Boîtes Archives</span>
                </a>
            </li>
        @endhasrole

        @hasrole('Gestionnaire-Standard')
            <li @class(['list', 'active' => str_contains($route_name, 'chemise')])>
                <a href="{{ route('manager.chemise.index') }}">
                    <span class="icon"><ion-icon name="folder-outline"></ion-icon></span>
                    <span class="title">Chemise Dossier</span>
                </a>
            </li>
        @endhasrole

        @hasrole('Gestionnaire-Central')
            <li class="list">
                <a href="{{ route('manager.transfert.index') }}">
                    <span class="icon"><ion-icon name="arrow-redo"></ion-icon></span>
                    <span class="title">Demande de transfert</span>
                </a>
            </li>
        @endhasrole

        @hasrole('Gestionnaire-Central')
            <li class="list">
                <a href="">
                    <span class="icon"><ion-icon name="swap-horizontal"></ion-icon></span>
                    <span class="title">Demande de Prêt</span>
                </a>
            </li>
        @endhasrole

        <li class="list">
            <a href="{{ route('home') }}">
                <span class="icon"><ion-icon name="laptop-outline"></ion-icon></span>
                <span class="title">Page d'accueil Utilisateur</span>
            </a>
        </li>
    </ul>

    <div class="user_profil" title="Utilisateur: Régis AISSI">
        <div class="profil">
            <ion-icon name="person-circle-outline"></ion-icon>
        </div>
        <div class="profil_username">
            <p>{{ Auth::user()->prenoms . ' ' . strtoupper(Auth::user()->nom ) }}</p>
        </div>
    </div>
</div>
