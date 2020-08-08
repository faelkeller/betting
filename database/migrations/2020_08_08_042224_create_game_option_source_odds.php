<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameOptionSourceOdds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_option_source_odds', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedMediumInteger('game_id');
            $table->unsignedSmallInteger('option_id');
            $table->unsignedSmallInteger('odd_source_id');
            $table->decimal('odd',6,2);
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
        Schema::dropIfExists('game_option_source_odds');
    }
}
