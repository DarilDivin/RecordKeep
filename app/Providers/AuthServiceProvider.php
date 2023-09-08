<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Role;
use App\Models\Service;
use App\Models\TypeRole;
use App\Models\Division;
use App\Models\Document;
use App\Models\Fonction;
use App\Models\Categorie;
use App\Models\Direction;
use App\Models\Permission;
use App\Models\DemandePret;
use App\Models\BoiteArchive;
use App\Models\ChemiseDossier;
use App\Models\NatureDocument;
use App\Models\RayonRangement;
use App\Models\DemandeTransfert;
use App\Policies\Admin\UserPolicy;
use App\Policies\Admin\RolePolicy;
use App\Policies\Admin\ServicePolicy;
use App\Policies\Admin\DivisionPolicy;
use App\Policies\Admin\FonctionPolicy;
use App\Policies\Admin\TypeRolePolicy;
use App\Policies\Admin\DirectionPolicy;
use App\Policies\Admin\PermissionPolicy;
use App\Policies\Manager\DocumentPolicy;
use App\Policies\Admin\DemandePretPolicy;
use App\Policies\Manager\CategoriePolicy;
use App\Policies\Manager\AllTransfertPolicy;
use App\Policies\Manager\BoiteArchivePolicy;
use App\Policies\Manager\ChemiseDossierPolicy;
use App\Policies\Manager\NatureDocumentPolicy;
use App\Policies\Manager\RayonRangementPolicy;
use App\Policies\Manager\DemandeTransfertPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Service::class => ServicePolicy::class,
        Division::class => DivisionPolicy::class,
        Document::class => DocumentPolicy::class,
        Fonction::class => FonctionPolicy::class,
        TypeRole::class => TypeRolePolicy::class,
        Categorie::class => CategoriePolicy::class,
        Direction::class => DirectionPolicy::class,
        Permission::class => PermissionPolicy::class,
        DemandePret::class => DemandePretPolicy::class,
        BoiteArchive::class => BoiteArchivePolicy::class,
        NatureDocument::class => NatureDocumentPolicy::class,
        ChemiseDossier::class => ChemiseDossierPolicy::class,
        RayonRangement::class => RayonRangementPolicy::class,
        DemandeTransfert::class => AllTransfertPolicy::class,
        DemandeTransfert::class => DemandeTransfertPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
