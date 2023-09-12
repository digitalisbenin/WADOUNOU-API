<?php

namespace Database\Factories;


use App\Models\Repas;
use App\Models\Client;
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
        $client = Client::all();
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->word,
            'prix' => $this->faker->word,
            'addrese' => $this->faker->word,
            'date' => $this->faker->date(),
            'client_id' => $client->random()->id,
            'repas_id' => $repas->random()->id,
        ];
    }
}
