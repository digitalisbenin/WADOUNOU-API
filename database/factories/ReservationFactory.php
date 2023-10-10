<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
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
            'place' => $this->faker->word,
            'contact'=> $this->faker->word,
            'date' => $this->faker->date(),
            'restaurant_id' => $restaurant->random()->id,
        ];
    }
}
