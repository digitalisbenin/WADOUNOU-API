<?php

namespace Database\Factories;


use App\Models\User;
use App\Models\Abonnement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();
        $abonnement = Abonnement::all();
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->word,
            'image_url' => $this->faker->word,
            'addrese' => $this->faker->word,
            'phone' => $this->faker->date(),
            'user_id' => $users->random()->id,
            'abonnement_id' => $abonnement->random()->id,
        ];
    }
}
