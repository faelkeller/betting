<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropGameResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('game_results');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('game_results', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedMediumInteger('game_id');
            $table->unsignedSmallInteger('option_id');
            $table->string('score', 20);
            $table->timestamps();
            $table->foreign('game_id')->references('id')->on('games');
            $table->foreign('option_id')->references('id')->on('options');
        });
    }
}
