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
        return [
            'signature' => 'N°564/DPAF/MISP/SGHTE/DPRF/SA',
            'nom' => 'Autorisation de stage',
            'code' => 'CH1B1R1',
            'objet' => 'Autorisation de stage',
            'source' => 'DGSP',
            'emetteur' => 'DGSP',
            'recepteur' => 'Euvince',
            'motclefs' => '#Administratifs',
            'dua' => '10',
            'datecreation' => '2023-06-09',
            'document' => 'documents/J4zQ5SgevZovpWA9kK3NhtTDMeADUJawZDvXyMnX.pdf',
            'categorie_id' => 1,
            'nature_document_id' => 1,
            'chemise_dossier_id' => 1,
            'division_id' => 1,
            'service_id' => 1,
            'direction_id' => 1
        ];
    }
}
