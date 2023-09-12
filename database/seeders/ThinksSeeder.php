<?php

namespace Database\Seeders;

use App\Models\Thinks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Thinks::count() == 0) {
            Thinks::factory()
                ->count(2)
                ->create();
        }
    }
}
