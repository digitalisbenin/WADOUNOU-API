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
        Schema::create('livraisons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('commande_id');
            $table->uuid('livreur_id');
            $table->string('name');
            $table->string('description');
            $table->string('adresse');
            $table->string('phone');
            $table->enum('status', ['En cours', 'suspended', 'Terminer'])->default('En cours');
            $table->timestamps();

            $table->foreign('commande_id')
            ->references('id')
            ->on('commandes')
            ->onDelete('cascade');

            $table->foreign('livreur_id')
            ->references('id')
            ->on('livreurs')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraisons');
    }
};
