<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $motsclefs = [
            'Administratif',
            'Économique',
            'Commerciale',
            'Organisationnelle',
            'Évènementielle',
            'Diplomatique',
            'Cartographique',
            'Informatique',
            'Marketing',
            'Ressources Humaines',
            'Logistique',
        ];

        $keywords = "";
        $index_tab = [];

        for($i = 0; $i < rand(2, 4); $i++){
            $keywords .= '#' . $this->faker/* ->unique() */->randomElement($motsclefs);
        }

        $signatureNumber = $this->faker->numberBetween(100, 999);
        $signature = "N° $signatureNumber/" . $this->faker->regexify('[A-Z]{2,5}/[A-Z]{2,4}/[A-Z]{2,5}/[A-Z]{2,3}');

        return [
            'timbre' => $signature,
            'nom' => $this->faker->sentence($this->faker->numberBetween(2, 3)),
            'code' => strtoupper($this->faker->bothify('?#?#?#')),
            'objet' => $this->faker->sentence($this->faker->numberBetween(4, 9)),
            'emetteur' => $this->faker->company(),
            'recepteur' => $this->faker->name(),
            'motclefs' => $keywords,
            'datecreation' => $this->faker->date(),
            'nature_document_id' => $this->faker->numberBetween(1, 8),
        ];
    }
}
