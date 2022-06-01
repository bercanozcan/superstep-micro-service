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
        Schema::create('raffles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('product_name');
            $table->string('product_sku');
            $table->string('product_price');
            $table->string('product_brand');
            $table->string('product_category');
            $table->string('product_option');
            $table->string('product_size');
            $table->string('product_color');
            $table->string('raffle_name');
            $table->date('raffle_start_date');
            $table->date('raffle_end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('raffles');
    }
};
