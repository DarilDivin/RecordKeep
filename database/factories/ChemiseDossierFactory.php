<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChemiseDossier>
 */
class ChemiseDossierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libelle' => $this->faker->sentence(rand(1, 2)),
            'code' => strtoupper($this->faker->bothify('?#')) . ' ' . rand(0, 9),
        ];
    }
}
