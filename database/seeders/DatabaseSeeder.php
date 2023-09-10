<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Service;
use App\Models\TypeRole;
use App\Models\Division;
use App\Models\Document;
use App\Models\Fonction;
use App\Models\Categorie;
use App\Models\Direction;
use App\Models\BoiteArchive;
use App\Models\ChemiseDossier;
use App\Models\NatureDocument;
use App\Models\Permission;
use App\Models\RayonRangement;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        /* Categorie::factory()->count(4)->create();
        NatureDocument::factory()->count(10)->create();
        Fonction::factory()->count(4)->create();

        RayonRangement::factory()->count(10)->create()->each(function ($rayon) {
            BoiteArchive::factory()->count(1)->create([
                'code' => $rayon->code . strtoupper(fake()->bothify('?#')),
                'rayon_rangement_id' => $rayon->id
            ])->each(function ($boite) {
                ChemiseDossier::factory()->count(1)->create([
                    'code' => $boite->code . strtoupper(fake()->bothify('?#')),
                    'boite_archive_id' => $boite->id
                ]);
            });
        });

        Direction::factory()->count(10)->create()->each(function ($direction) {
            Service::factory()->count(rand(1, 3))->create([
                'direction_id' => $direction->id
            ])->each(function ($service) use($direction) {
                Division::factory()->count(rand(2, 3))->create([
                    'service_id' => $service->id
                ])->each(function ($division) use($service, $direction) {
                    Document::factory()->count(rand(2, 3))->create([
                        'division_id' => $division->id,
                        'service_id' => $service->id,
                        'direction_id' => $direction->id
                    ]);
                    User::factory()->count(rand(2, 3))->create([
                        'division_id' => $division->id,
                        'service_id' => $service->id,
                        'direction_id' => $direction->id
                    ]);
                });
            });
        }); */

        TypeRole::factory()->count(4)->create();

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);

        \App\Models\User::factory()->create([
            'nom' => 'Doe',
            'prenoms' => 'Jonh',
            'email' => 'jonh@doe.fr',
            'password' => Hash::make('jonhdoefr'),
        ])->assignRole([Role::all()])
        ->permissions()->sync(Permission::all());

        \App\Models\User::factory()->create([
            'nom' => 'Lawson',
            'prenoms' => 'Tony',
            'email' => 'tony@lawson.fr',
            'password' => Hash::make('tonylawson'),
        ])->assignRole([
            'Administrateur',
        ]);

        \App\Models\User::factory()->create([
            'nom' => 'Lossin',
            'prenoms' => 'lobert',
            'email' => 'lossin@lobert.fr',
            'password' => Hash::make('lossinlobert'),
        ])->assignRole([
            'Gestionnaire-Standard',
        ]);

        \App\Models\User::factory()->create([
            'nom' => 'Jackson',
            'prenoms' => 'jinard',
            'email' => 'jin@jack.fr',
            'password' => Hash::make('jackjinard'),
        ])->assignRole([
            'Gestionnaire-Central',
        ]);

    }
}
