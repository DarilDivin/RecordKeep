<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Division>
 */
class DivisionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sigleLength = $this->faker->randomElement([2, 3, 4]);

        return [
            'division' => $this->faker->company(),
            'sigle' => strtoupper($this->faker->lexify(str_repeat('?', $sigleLength))),
        ];
    }
}
