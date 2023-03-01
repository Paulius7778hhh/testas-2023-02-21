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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('title', 60);
            $table->string('picture', 600)->nullable();
            $table->smallInteger('price')->unsigned();
            $table->json('rating')->nullable();
            $table->unsignedBigInteger('restaurants_id');
            $table->foreign('restaurants_id')->references('id')->on('restaurants');
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
        Schema::dropIfExists('dishes');
    }
};
