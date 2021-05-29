<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveOptionIdOdd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game_option_source_odds', function (Blueprint $table) {
            $table->dropForeign(['option_id']);
            $table->dropColumn(['option_id', 'odd']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game_option_source_odds', function (Blueprint $table) {
            $table->unsignedSmallInteger('option_id');
            $table->decimal('odd', 6, 2);
            $table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
        });
    }
}
