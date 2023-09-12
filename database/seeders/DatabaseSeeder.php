<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            AbonnementSeeder::class,
            CategorieSeeder::class,
            ClientSeeder::class,
            RestaurantSeeder::class,
            RepasSeeder::class,
            LivreurSeeder::class,
            CommentaireSeeder::class,
            ThinksSeeder::class,
            ReservationSeeder::class,
            CommandeSeeder::class,
            LivraisonSeeder::class,
            
            
        ]);
    }
}
