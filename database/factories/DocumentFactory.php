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
        $signatureNumber = $this->faker->numberBetween(100, 999);
        $signature = "N° $signatureNumber/" . $this->faker->regexify('[A-Z]{2,5}/[A-Z]{2,4}/[A-Z]{2,5}/[A-Z]{2,3}');

        return [
            'signature' => $signature,
            'nom' => $this->faker->sentence($this->faker->numberBetween(2, 3)),
            'code' => strtoupper($this->faker->bothify('?#?#?#')),
            'objet' => $this->faker->sentence($this->faker->numberBetween(4, 9)),
            'source' => $this->faker->company(),
            'emetteur' => $this->faker->company(),
            'recepteur' => $this->faker->name(),
            /* 'motclefs' => '#Administratifs', */
            'dua' => $this->faker->numberBetween(4, 15),
            'datecreation' => $this->faker->date(),
            /* 'document' => 'documents/J4zQ5SgevZovpWA9kK3NhtTDMeADUJawZDvXyMnX.pdf', */
            'categorie_id' => $this->faker->numberBetween(1, 6),
            'nature_document_id' => $this->faker->numberBetween(1, 8),
            /* 'chemise_dossier_id' => 1, */
            'division_id' => $this->faker->numberBetween(1, 30),
            'service_id' => $this->faker->numberBetween(1, 20),
            'direction_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
