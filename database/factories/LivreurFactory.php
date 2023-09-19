<?php

namespace Database\Factories;

use App\Models\User;
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
        $users = User::all();
        $restaurant = Restaurant::all();
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->word,
            'phone' => $this->faker->word,
            'addrese' => $this->faker->word,
            'user_id' => $users->random()->id,
            'restaurant_id' => $restaurant->random()->id,
        ];
    }
}
