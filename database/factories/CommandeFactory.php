<?php

namespace Database\Factories;


use App\Models\Repas;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $repas = Repas::all();
        $user = User::all();
        $statues = ['En cours','suspended','Terminer'];
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->word,
            'contact' => $this->faker->word,
            'addrese' => $this->faker->word,
            'status' => $this->faker->unique()->randomElement($statues),
            'user_id' => $user->random()->id,
            'repas_id' => $repas->random()->id,
        ];
    }
}
