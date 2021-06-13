<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('birthday')->nullable();
            $table->string('status')->nullable();
            $table->longText('description')->nullable()->default('-');
            $table->unsignedBigInteger('voice_actor_id')->index()->nullable();
            $table->longText('photo');
            $table->longText('thumbnail');
            $table->timestamps();

            $table->foreign('voice_actor_id')->references('id')->on('people')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
