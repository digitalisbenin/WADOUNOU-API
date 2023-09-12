<?php

namespace Database\Factories;

use App\Models\Restaurant;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Repas>
 */
class RepasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categorie = Categorie::all();
        $restaurant = Restaurant::all();
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->word,
            'prix' => $this->faker->word,
            'jours' => $this->faker->word,
            'image_url' => $this->faker->word,
            'categirie_id' => $categorie->random()->id,
            'restaurant_id' => $restaurant->random()->id,
        ];
    }
}
