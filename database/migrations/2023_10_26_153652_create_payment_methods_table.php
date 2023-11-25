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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('commande_id');
            $table->string('transationId');
            $table->string('card_brand')->nullable();
            $table->string('last4')->nullable();
            $table->string('exp_month')->nullable();
            $table->year('exp_year')->nullable();
            $table->string('phone_number')->nullable();
            $table->timestamps();

            $table->foreign('commande_id')
                ->references('id')
                ->on('commandes')
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
        Schema::dropIfExists('payment_methods');
    }
};
