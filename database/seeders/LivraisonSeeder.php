<?php

namespace Database\Seeders;

use App\Models\Livraison;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivraisonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Livraison::count() == 0) {
            Livraison::factory()
                ->count(2)
                ->create();
        }
    }
}
