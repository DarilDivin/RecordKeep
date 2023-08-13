<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BoiteArchive;
use App\Models\Categorie;
use App\Models\ChemiseDossier;
use App\Models\Direction;
use App\Models\Division;
use App\Models\Document;
use App\Models\Fonction;
use App\Models\NatureDocument;
use App\Models\RayonRangement;
use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Categorie::factory()->count(11)->create();
        NatureDocument::factory()->count(10)->create();
        Fonction::factory()->count(4)->create();

        $code = '';

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
                });
            });
        });
    }
}
