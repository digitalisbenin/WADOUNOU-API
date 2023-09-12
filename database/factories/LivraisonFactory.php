<?php

namespace Database\Factories;

use App\Models\Commande;
use App\Models\Livreur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livraison>
 */
class LivraisonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $commande = Commande::all();
        $livreur = Livreur::all();
        $statues = ['En cours','suspended','Arriver'];
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->word,
            'phone' => $this->faker->word,
            'addrese' => $this->faker->word,
            'status' => $this->faker->unique()->randomElement($statues),
            'commande_id' => $commande->random()->id,
            'livreur_id' => $livreur->random()->id,
        ];
    }
}
