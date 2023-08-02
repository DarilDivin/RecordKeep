<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Direction>
 */
class DirectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sigleLength = $this->faker->randomElement([2, 3, 4, 5]);

        return [
            'direction' => $this->faker->company(),
            'sigle' => strtoupper($this->faker->lexify(str_repeat('?', $sigleLength)))
        ];
    }
}
