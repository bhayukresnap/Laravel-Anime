<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('english')->nullable();
            $table->string('synonyms')->nullable();
            $table->string('japanese')->nullable();
            //$table->string('slug')->unique();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->dateTime('aired_from')->nullable();
            $table->dateTime('aired_to')->nullable();
            $table->longText('description')->nullable()->default('-');
            $table->unsignedBigInteger('studio_id')->nullable();
            $table->unsignedBigInteger('source_id')->nullable();
            $table->unsignedBigInteger('season_id')->nullable();
            // Producers,
            $table->longText('photo');
            $table->longText('thumbnail');
            $table->timestamps();

            $table->foreign('studio_id')->references('id')->on('studios')->onDelete('SET NULL');
            $table->foreign('source_id')->references('id')->on('sources')->onDelete('SET NULL');
            $table->foreign('season_id')->references('id')->on('seasons')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animes');
    }
}
