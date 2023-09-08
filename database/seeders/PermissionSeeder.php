<?php

namespace Database\Seeders;

use App\Models\TypeRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* PERMISSIONS DES ADMINISTRATEURS */
        $adminPermissions = [
            'Gestion des Services',
            'Gestion des Fonctions',
            'Gestion des Divisions',
            'Gestion des Directions',
            'Gestion des Utilisateurs',
        ];

        /* PERMISSIONS DES GESTIONNAIRES */
        $standardManagerPermissions = [
            'Gestion des Documents',
            'Gestion des Catégories',
            'Gestion des Boîtes Archives',
            'Gestion des Rayons Rangements',
            'Gestion des Chemises Dossiers',
            'Gestion des Natures de Documents'
        ];

        $centralManagerPermissions = [
            'Gestion des Classements',
            'Gestion des Demandes de Prêts',
            'Gestion des Demandes de Transferts'
        ];

        /* PERMISSIONS DES UTILISATEURS */
        $userPermissions = [
            'Demander un Prêt',
            'Consulter un Document',
            'Rechercher un Document',
            'Télécharger un Document',
        ];

        $userRole = Role::where('name', 'Utilisateur')->first();
        $adminRole = Role::where('name', 'Administrateur')->first();
        $standardManagerRole = Role::where('name', 'Gestionnaire-Standard')->first();
        $centralManagerRole = Role::where('name', 'Gestionnaire-Central')->first();
        $userTypeRole = TypeRole::where('libelle', 'Utilisateur')->first();
        $adminTypeRole = TypeRole::where('libelle', 'Administrateur')->first();
        $standardManagerTypeRole = TypeRole::where('libelle', 'Gestionnaire-Standard')->first();
        $centralManagerTypeRole = TypeRole::where('libelle', 'Gestionnaire-Central')->first();

        foreach($adminPermissions as $permission){
            Permission::create([
                'name' => $permission,
                'type_role_id' => $adminTypeRole->id,
            ]);
            $adminRole->givePermissionTo($permission);
        }
        /* ------------------------------------------------------------------------------------------------- */

        foreach($userPermissions as $permission){
            Permission::create([
                'name' => $permission,
                'type_role_id' => $userTypeRole->id,
            ]);
            $userRole->givePermissionTo($permission);
        }
        /* ------------------------------------------------------------------------------------------------- */

        foreach($standardManagerPermissions as $permission){
            Permission::create([
                'name' => $permission,
                'type_role_id' => $standardManagerTypeRole->id,
            ]);
            $standardManagerRole->givePermissionTo($permission);
        }

        foreach($centralManagerPermissions as $permission){
            Permission::create([
                'name' => $permission,
                'type_role_id' => $centralManagerTypeRole->id,
            ]);
            $centralManagerRole->givePermissionTo($permission);
        }
    }
}
