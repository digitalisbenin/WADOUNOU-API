<?php

namespace Database\Factories;


use App\Models\Repas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commentaire>
 */
class CommentaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $repas = Repas::all();
        return [
            'content' => $this->faker->word,
            'repas_id' => $repas->random()->id,
        ];
    }
}
