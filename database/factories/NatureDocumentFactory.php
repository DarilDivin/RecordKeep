<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NatureDocument>
 */
class NatureDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $natures = [
            'Note de service',
            'Arrêté',
            'Decret',
            'Message porté',
            'Courrier entré',
            'Courrier départ',
            'Bordereau d\'envoi',
            'Letrre Administrative',
            'Letrre Commerciale',
            'Rapport'
        ];

        return [
            'nature' => $this->faker->unique()->randomElement($natures),
            'dua' => $this->faker->numberBetween(4, 15),
            'categorie_id' => $this->faker->numberBetween(1, 6),
        ];
    }
}
