<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetGame extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bet_game', function (Blueprint $table) {
            $table->unsignedMediumInteger('bet_id');
            $table->unsignedMediumInteger('game_id');
            $table->timestamps();
            $table->foreign('bet_id')->references('id')->on('bets');
            $table->foreign('game_id')->references('id')->on('games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bet_game');
    }
}
