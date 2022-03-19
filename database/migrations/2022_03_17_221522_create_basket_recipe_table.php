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
        Schema::create('basket_recipe', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')->references('id')->on('recipes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('basket_id')->references('id')->on('baskets')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_shopping_list');
    }
};
