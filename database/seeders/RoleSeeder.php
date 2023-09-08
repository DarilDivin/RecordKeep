<?php

namespace Database\Seeders;

use App\Models\TypeRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTypeRole = TypeRole::where('libelle', 'Utilisateur')->first();
        $adminTypeRole = TypeRole::where('libelle', 'Administrateur')->first();
        $standardManagerTypeRole = TypeRole::where('libelle', 'Gestionnaire-Standard')->first();
        $centralManagerTypeRole = TypeRole::where('libelle', 'Gestionnaire-Central')->first();

        Role::create([
            'name' => 'Utilisateur',
            'type_role_id' => $userTypeRole->id
        ]);

        Role::create([
            'name' => 'Administrateur',
            'type_role_id' => $adminTypeRole->id
        ]);

        Role::create([
            'name' => 'Gestionnaire-Standard',
            'type_role_id' => $standardManagerTypeRole->id
        ]);

        Role::create([
            'name' => 'Gestionnaire-Central',
            'type_role_id' => $centralManagerTypeRole->id
        ]);

    }
}
