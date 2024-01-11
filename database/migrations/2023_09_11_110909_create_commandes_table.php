<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->uuid('restaurant_id')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('contact')->nullable();
            $table->string('adresse')->nullable();
            $table->decimal('montant')->nullable();
            $table->enum('status', ['En attente', 'livrer', 'non livrer','Affecter']);
            $table->timestamps();

                
            $table->foreign('restaurant_id')
            ->references('id')
            ->on('restaurants')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
