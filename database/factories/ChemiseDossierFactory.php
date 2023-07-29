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
            'libelle' => 'Chemise Dossier 1',
            'code' => 'CH 1',
            'boite_archive_id' => 1
        ];
    }
}
