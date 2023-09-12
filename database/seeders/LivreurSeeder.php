<?php

namespace Database\Seeders;

use App\Models\Livreur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivreurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Livreur::count() == 0) {
            Livreur::factory()
                ->count(4)
                ->create();
        }
    }
}
