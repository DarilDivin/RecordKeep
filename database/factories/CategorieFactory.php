<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categorie>
 */
class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Administratif',
            'Économique',
            'Diplomatique',
            'Ressources Humaines',
        ];

        return [
            'categorie' => $this->faker->unique()->randomElement($categories)
        ];
    }
}
