<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameTeamScore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game_team', function (Blueprint $table) {
            $table->increments('id')->first();
        });

        Schema::create('game_team_score', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('game_team_id');
            $table->timestamps();
            $table->foreign('game_team_id')->references('id')->on('game_team')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_team_score');

        Schema::table('game_team', function (Blueprint $table) {
            $table->dropColumn('id');
        });
    }
}
