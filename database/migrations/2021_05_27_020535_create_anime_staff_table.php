<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimeStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anime_staff', function (Blueprint $table) {
            $table->unsignedBigInteger('anime_id');
            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('anime_id')->references('id')->on('animes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anime_staff');
    }
}
