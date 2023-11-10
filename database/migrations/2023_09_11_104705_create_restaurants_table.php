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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->uuid('abonnement_id')->nullable();
            $table->string('name');
            $table->string('adresse');
            $table->string('phone');
            $table->string('description');
            $table->string('specilite');
            $table->time('heure_douverture');
            $table->time('heure_fermeture');
            $table->string('document_url')->nullable();
            $table->string('capacite');
            $table->string('image_url');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('abonnement_id')
                ->references('id')
                ->on('abonnements')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
