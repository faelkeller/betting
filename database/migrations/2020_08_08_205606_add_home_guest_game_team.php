<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHomeGuestGameTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game_team', function (Blueprint $table) {
            $table->boolean('home')->after('team_id');
            $table->boolean('guest')->after('home');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game_team', function (Blueprint $table) {
            $table->dropColumn(['home', 'guest']);
        });
    }
}
