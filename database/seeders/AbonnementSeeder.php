<?php

namespace Database\Seeders;

use App\Models\Abonnement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbonnementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Abonnement::count() == 0) {
            Abonnement::factory()
                ->count(4)
                ->create();
        }
    }
}
