<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categorie;
use App\Models\Direction;
use App\Models\Division;
use App\Models\Document;
use App\Models\Fonction;
use App\Models\NatureDocument;
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

        Direction::factory()->count(10)->create();
        Service::factory()->count(25)->create();
        Division::factory()->count(35)->create();
        Categorie::factory()->count(11)->create();
        NatureDocument::factory()->count(10)->create();
        Fonction::factory()->count(4)->create();
        Document::factory()->count(20)->create();
    }
}
