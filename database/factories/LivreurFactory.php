<?php

namespace Database\Factories;


use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livreur>
 */
class LivreurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $restaurant = Restaurant::all();
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->word,
            'phone' => $this->faker->word,
            'addrese' => $this->faker->word,
            'restaurant_id' => $restaurant->random()->id,
        ];
    }
}
