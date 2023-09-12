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
            $table->uuid('repas_id');
            $table->uuid('client_id');
            $table->string('name');
            $table->string('description');
            $table->string('prix');
            $table->DateTime('date');
            $table->string('addrese');
            $table->timestamps();

            $table->foreign('repas_id')
            ->references('id')
            ->on('repas')
            ->onDelete('cascade');

            $table->foreign('client_id')
            ->references('id')
            ->on('clients')
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
