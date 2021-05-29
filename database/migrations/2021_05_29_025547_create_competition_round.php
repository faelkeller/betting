<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionRound extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competition_round', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedSmallInteger('competition_id');
            $table->unsignedMediumInteger('round_id');
            $table->foreign('competition_id')->references('id')->on('competitions')->onDelete('cascade');
            $table->foreign('round_id')->references('id')->on('rounds')->onDelete('cascade');
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
        Schema::dropIfExists('competition_round');
    }
}
