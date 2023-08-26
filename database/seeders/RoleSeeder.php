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
        /* $roles = [
            'Utilisateur',
            'Gestionnaire',
            'Administrateur',
            'Gestionnaire-Utilisateur',
            'Administrateur-Utilisateur',
            'Administrateur-Gestionnaire',
            'Tout-Rôle',
        ]; */

        $userTypeRole = TypeRole::where('libelle', 'Utilisateur')->first();
        $adminTypeRole = TypeRole::where('libelle', 'Administrateur')->first();
        $managerTypeRole = TypeRole::where('libelle', 'Gestionnaire')->first();

        Role::create([
            'name' => 'Utilisateur',
            'type_role_id' => $userTypeRole->id
        ]);

        Role::create([
            'name' => 'Administrateur',
            'type_role_id' => $adminTypeRole->id
        ]);

        Role::create([
            'name' => 'Gestionnaire',
            'type_role_id' => $managerTypeRole->id
        ]);

    }
}
