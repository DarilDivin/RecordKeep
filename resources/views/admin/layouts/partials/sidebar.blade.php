@php
    use App\Models\DemandePret;
    use App\Models\DemandeTransfert;
    $route_name = request()->route()->getName();
    $centralManagerDPNotifications = DemandePret::where('etat', 'Encours')->count();
    $centralManagerDTNotifications = DemandeTransfert::where('transfere', '=', '1')->where('valide', '=', '0')->count();
    $standardManagerDTNotifications = DemandeTransfert::where('direction_id', '=', Auth::user()->direction_id)->where('transferable', '=', '1')->where('transfere', '=', '0')->count();
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

        @canany(['Gestion des Rôles',
                'Gestion des Services',
                'Gestion des Fonctions',
                'Gestion des Divisions',
                'Gestion des Documents',
                'Gestion des Directions',
                'Gestion des Catégories',
                'Gestion des Classements',
                'Gestion des Utilisateurs',
                'Gestion des Boîtes Archives',
                'Gestion des Rayons Rangements',
                'Gestion des Chemises Dossiers',
                'Gestion des Demandes de Prêts',
                'Gestion des Natures de Documents',
                'Gestion des Demandes de Transferts',
                'Gestion des Demandes de Transferts du MISP'
            ])
            <li @class(['list', 'active' => str_contains($route_name, 'statistique')])>
                <a href="{{ route('admin.statistique') }}">
                    <span class="icon"><ion-icon name="stats-chart-outline"></ion-icon></span>
                    <span class="title">Statistiques</span>
                </a>
            </li>
        @endcanany

        @can('Gestion des Utilisateurs')
            <li @class(['list', 'active' => str_contains($route_name, 'user')])>
                <a href="{{ route('admin.user.index') }}">
                    <span class="icon"><ion-icon name="people"></ion-icon></span>
                    <span class="title">Utilisateurs</span>
                </a>
            </li>
        @endcan

        @can('Gestion des Fonctions')
            <li @class(['list', 'active' => str_contains($route_name, 'fonction')])>
                <a href="{{ route('admin.fonction.index') }}">
                    <span class="icon"><ion-icon name="briefcase-outline"></ion-icon></span>
                    <span class="title">Fonctions</span>
                </a>
            </li>
        @endcan

        @can('Gestion des Rôles')
            <li @class(['list', 'active' => str_contains($route_name, 'role')])>
                <a href="{{ route('admin.role.index') }}">
                    <span class="icon"><ion-icon name="git-compare-outline"></ion-icon></span>
                    <span class="title">Rôles</span>
                </a>
            </li>
        @endcan

        @can('Gestion des Directions')
            <li @class(['list', 'active' => str_contains($route_name, 'direction')])>
                <a href="{{ route('admin.direction.index') }}">
                    <span class="icon"><ion-icon name="business-outline"></ion-icon></span>
                    <span class="title">Directions</span>
                </a>
            </li>
        @endcan

        @can('Gestion des Services')
            <li @class(['list', 'active' => str_contains($route_name, 'service')])>
                <a href="{{ route('admin.service.index') }}">
                    <span class="icon"><ion-icon name="business-outline"></ion-icon></span>
                    <span class="title">Services</span>
                </a>
            </li>
        @endcan

        @can('Gestion des Divisions')
            <li @class(['list', 'active' => str_contains($route_name, 'division')])>
                <a href="{{ route('admin.division.index') }}">
                    <span class="icon"><ion-icon name="business-outline"></ion-icon></span>
                    <span class="title">Divisions</span>
                </a>
            </li>
        @endcan

        @can('Gestion des Documents')
            <li @class(['list', 'active' => str_contains($route_name, 'document')])>
                <a href="{{ route('manager.document.index') }}">
                    <span class="icon"><ion-icon name="document-text-outline"></ion-icon></span>
                    <span class="title">Documents</span>
                </a>
            </li>
        @endcan

        @can('Gestion des Catégories')
            <li @class(['list', 'active' => str_contains($route_name, 'categorie')])>
                <a href="{{ route('manager.categorie.index') }}">
                    <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                    <span class="title">Catégories</span>
                </a>
            </li>
        @endcan

        @can('Gestion des Natures de Documents')
            <li @class(['list', 'active' => str_contains($route_name, 'nature')])>
                <a href="{{ route('manager.nature.index') }}">
                    <span class="icon"><ion-icon name="documents-outline"></ion-icon></span>
                    <span class="title">Nature de Documents</span>
                </a>
            </li>
        @endcan

        @can('Gestion des Rayons Rangements')
            <li @class(['list', 'active' => str_contains($route_name, 'rayon')])>
                <a href="{{ route('manager.rayon.index') }}">
                    <span class="icon"><ion-icon name="file-tray-stacked-outline"></ion-icon></span>
                    <span class="title">Rayons de Rangement</span>
                </a>
            </li>
        @endcan

        @can('Gestion des Boîtes Archives')
            <li @class(['list', 'active' => str_contains($route_name, 'boite')])>
                <a href="{{ route('manager.boite.index') }}">
                    <span class="icon"><ion-icon name="file-tray-full-outline"></ion-icon></span>
                    <span class="title">Boîtes Archives</span>
                </a>
            </li>
        @endcan

        @can('Gestion des Chemises Dossiers')
            <li @class(['list', 'active' => str_contains($route_name, 'chemise')])>
                <a href="{{ route('manager.chemise.index') }}">
                    <span class="icon"><ion-icon name="folder-outline"></ion-icon></span>
                    <span class="title">Chemises Dossiers</span>
                </a>
            </li>
        @endcan

        @can('Gestion des Demandes de Transferts')
            <li @class(['list', 'active' => str_contains($route_name, 'transfert')])>
                <a href="{{ route('manager.transfert.index') }}">
                    <span class="icon"><ion-icon name="arrow-redo"></ion-icon></span>
                    <span class="title">Demandes de transferts</span>
                    @if ($standardManagerDTNotifications > 0)
                        <span class="notif-alert">{{ $standardManagerDTNotifications }}</span>
                    @endif
                </a>
            </li>
        @endcan

        @can('Gestion des Demandes de Prêts')
            <li @class(['list', 'active' => str_contains($route_name, 'rapport-depart-list')])>
                <a href="{{ route('rapport-depart-list') }}">
                    <span class="icon"><ion-icon name="swap-horizontal"></ion-icon></span>
                    <span class="title">Rapport de Prêts</span>
                </a>
            </li>
        @endcan

        @can('Gestion des Demandes de Transferts du MISP')
            <li @class(['list', 'active' => str_contains($route_name, 'all')])>
                <a href="{{ route('manager.transfert.all') }}">
                    <span class="icon"><ion-icon name="send"></ion-icon></span>
                    <span class="title">Transferts du MISP</span>
                    @if ($centralManagerDTNotifications > 0)
                        <span class="notif-alert">{{ $centralManagerDTNotifications }}</span>
                    @endif
                </a>
            </li>
        @endcan

        @can('Gestion des Classements')
            <li @class(['list', 'active' => str_contains($route_name, 'classed')])>
                <a href="{{ route('manager.document.classed') }}">
                    <span class="icon"><ion-icon name="document-attach-outline"></ion-icon></span>
                    <span class="title">Gestion des Classements</span>
                </a>
            </li>
        @endcan

        @can('Gestion des Demandes de Prêts')
            <li @class(['list', 'active' => str_contains($route_name, 'demande-de-prets')])>
                <a href="{{ route('demande-de-prets') }}">
                    <span class="icon"><ion-icon name="document-lock-outline"></ion-icon></span>
                    <span class="title">Demandes de Prêts</span>
                    @if ($centralManagerDPNotifications > 0)
                        <span class="notif-alert">{{ $centralManagerDPNotifications }}</span>
                    @endif
                </a>
            </li>
        @endcan

        @canany(['Consulter un Document', 'Télécharger un Document', 'Rechercher un Document', 'Demander un Prêt'])
            <li class="list">
                <a href="{{ route('home') }}">
                    <span class="icon"><ion-icon name="laptop-outline"></ion-icon></span>
                    <span class="title">Page d'accueil Utilisateur</span>
                </a>
            </li>
        @endcan
    </ul>

    <div class="user_profil" title="Utilisateur: {{ Auth::user()->prenoms . ' ' . strtoupper(Auth::user()->nom ) }}">
        <div class="profil">
            <ion-icon name="person-circle-outline"></ion-icon>
        </div>
        <div class="profil_username">
            <p>{{ Auth::user()->prenoms . ' ' . strtoupper(Auth::user()->nom ) }}</p>
        </div>
    </div>
    <div class="userOptions">
        <a title="Se déconnecter"
            href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
        >
            <ion-icon name="log-out-outline"></ion-icon>
        </a>
        @auth
            <form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none">
                @csrf
            </form>
        @endauth
        <a href="{{ route('settings') }}" title="Parametres">
            <ion-icon name="settings-outline"></ion-icon>
        </a>
    </div>
</div>
