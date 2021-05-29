<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropRoundGame extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('round_game');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('round_game', function (Blueprint $table) {
            $table->unsignedMediumInteger('round_id');
            $table->unsignedMediumInteger('game_id');
            $table->timestamps();
            $table->foreign('round_id')->references('id')->on('rounds');
            $table->foreign('game_id')->references('id')->on('games');
        });
    }
}
