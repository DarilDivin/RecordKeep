<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fonction>
 */
class FonctionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fonctions = [
            'Directeur',
            'Chef Service',
            'Chef Division',
            'Collaborateur'
        ];

        return [
            'fonction' =>$this->faker->unique()->randomElement($fonctions)
        ];
    }
}
