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
        Schema::create('thinks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('repas_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('icon_path')->nullable();
            $table->enum('type', ['feel', 'think'])->default('think');
            $table->timestamps();

            $table->foreign('repas_id')
            ->references('id')
            ->on('repas')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thinks');
    }
};
