<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

        Direction::factory(1)->count(1)->create();
        Service::factory(1)->count(1)->create();
        Division::factory(1)->count(1)->create();
        NatureDocument::factory(1)->count(1)->create();
        Fonction::factory(1)->count(1)->create();
        Document::factory(1)->count(1)->create();
    }
}
