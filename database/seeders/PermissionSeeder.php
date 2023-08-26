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
        $managerPermissions = [
            'Gestion des Documents',
            'Gestion des Catégories',
            'Gestion des Classements',
            'Gestion des Boîtes Archives',
            'Gestion des Rayons Rangements',
            'Gestion des Chemises Dossiers',
            'Gestion des Demandes de Prêts',
            'Gestion des Natures de Documents',
            'Gestion des Demandes de Transferts',
        ];

        /* PERMISSIONS DES UTILISATEURS */
        $userPermissions = [
            'Demander un Prêt',
            'Consulter un Document',
            'Rechercher un Document',
            'Télécharger un Document',
        ];

        /* $allPermissions = array_merge(
            $adminPermissions,
            $managerPermissions,
            $userPermissions
        );

        $managerUserPermissions = array_merge(
            $managerPermissions,
            $userPermissions
        );

        $adminUserPermissions = array_merge(
            $adminPermissions,
            $userPermissions
        );

        $adminManagerPermissions = array_merge(
            $adminPermissions,
            $managerPermissions,
        ); */

        /* $allRole = Role::where('name', 'Tout-Rôle')->first(); */
        $userRole = Role::where('name', 'Utilisateur')->first();
        $adminRole = Role::where('name', 'Administrateur')->first();
        $managerRole = Role::where('name', 'Gestionnaire')->first();
        $userTypeRole = TypeRole::where('libelle', 'Utilisateur')->first();
        $adminTypeRole = TypeRole::where('libelle', 'Administrateur')->first();
        $managerTypeRole = TypeRole::where('libelle', 'Gestionnaire')->first();
        /* $managerUserRole = Role::where('name', 'Gestionnaire-Utilisateur')->first();
        $adminUserRole = Role::where('name', 'Administrateur-Utilisateur')->first();
        $adminManagerRole = Role::where('name', 'Administrateur-Gestionnaire')->first(); */

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

        foreach($managerPermissions as $permission){
            Permission::create([
                'name' => $permission,
                'type_role_id' => $managerTypeRole->id,
            ]);
            $managerRole->givePermissionTo($permission);
        }
        /* ------------------------------------------------------------------------------------------------- */


        /* foreach($managerUserPermissions as $permission){
            $managerUserRole->givePermissionTo($permission);
        } */
        /* ------------------------------------------------------------------------------------------------- */


        /* foreach($adminUserPermissions as $permission){
            $adminUserRole->givePermissionTo($permission);
        } */
        /* ------------------------------------------------------------------------------------------------- */


        /* foreach($adminManagerPermissions as $permission){
            $adminManagerRole->givePermissionTo($permission);
        } */
        /* ------------------------------------------------------------------------------------------------- */


        /* foreach($allPermissions as $permission){
            $allRole->givePermissionTo($permission);
        } */
    }
}
