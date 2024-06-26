<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TypeRole>
 */
class TypeRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $typeOfRoles = [
            'Utilisateur',
            'Gestionnaire-Standard',
            'Gestionnaire-Central',
            'Administrateur',
        ];

        return [
            'libelle' =>$this->faker->unique()->randomElement($typeOfRoles)
        ];
    }
}
