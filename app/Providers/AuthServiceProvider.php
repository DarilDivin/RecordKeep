<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\BoiteArchive;
use App\Models\Categorie;
use App\Models\ChemiseDossier;
use App\Models\DemandePret;
use App\Models\Direction;
use App\Models\Division;
use App\Models\Document;
use App\Models\Fonction;
use App\Models\NatureDocument;
use App\Models\RayonRangement;
use App\Models\Service;
use App\Models\Transfert;
use App\Models\User;
use App\Policies\Admin\BoiteArchivePolicy;
use App\Policies\Admin\CategoriePolicy;
use App\Policies\Admin\ChemiseDossierPolicy;
use App\Policies\Admin\DemandePretPolicy;
use App\Policies\Admin\DirectionPolicy;
use App\Policies\Admin\DivisionPolicy;
use App\Policies\Admin\DocumentPolicy;
use App\Policies\Admin\FonctionPolicy;
use App\Policies\Admin\NatureDocumentPolicy;
use App\Policies\Admin\RayonRangementPolicy;
use App\Policies\Admin\ServicePolicy;
use App\Policies\Admin\TransfertPolicy;
use App\Policies\Admin\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        NatureDocument::class => NatureDocumentPolicy::class,
        ChemiseDossier::class => ChemiseDossierPolicy::class,
        RayonRangement::class => RayonRangementPolicy::class,
        BoiteArchive::class => BoiteArchivePolicy::class,
        DemandePret::class => DemandePretPolicy::class,
        Transfert::class => TransfertPolicy::class,
        Categorie::class => CategoriePolicy::class,
        Direction::class => DirectionPolicy::class,
        Division::class => DivisionPolicy::class,
        Document::class => DocumentPolicy::class,
        Fonction::class => FonctionPolicy::class,
        Service::class => ServicePolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
