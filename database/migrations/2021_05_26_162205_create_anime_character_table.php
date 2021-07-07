<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimeCharacterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anime_character', function (Blueprint $table) {
            $table->unsignedBigInteger('anime_id');
            $table->unsignedBigInteger('character_id');
            $table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');
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
        Schema::dropIfExists('anime_character');
    }
}
