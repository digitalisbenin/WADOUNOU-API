<?php

namespace Database\Factories;

use App\Models\Repas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thinks>
 */
class ThinksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $repas = Repas::all();
        $types = ['feel','think'];
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->word,
            'icon_path' => $this->faker->word,
            'type' => $this->faker->randomElement($types),
            'repas_id' => $repas->random()->id,
        ];
    }
}
