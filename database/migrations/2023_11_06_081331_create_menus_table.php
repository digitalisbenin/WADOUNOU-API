<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('repas_id');
            $table->uuid('restaurant_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->decimal('prix')->nullable();
            $table->timestamps();

            $table->foreign('repas_id')
            ->references('id')
            ->on('repas')
            ->onDelete('cascade');

            $table->foreign('restaurant_id')
            ->references('id')
            ->on('restaurants')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
