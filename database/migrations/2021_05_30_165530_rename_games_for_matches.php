<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameGamesForMatches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename("games", "matches");

        $this->renameTableFields('bet_game', 'bet_match', [
            (object)['old' => 'game_id', 'new' => 'match_id', 'after' => null, 'reference_table' => 'matches', 'first' => true],
            (object)['old' => 'bet_id', 'new' => 'bet_id', 'after' => 'match_id', 'reference_table' => 'bets', 'first' => false],
        ]);

        $this->renameTableFields('bet_game', 'bet_match', [
            (object)['old' => 'game_id', 'new' => 'match_id', 'after' => null, 'reference_table' => 'matches', 'first' => true],
            (object)['old' => 'bet_id', 'new' => 'bet_id', 'after' => 'match_id', 'reference_table' => 'bets', 'first' => false],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename("matches", "games");

        $this->renameTableFields('bet_match', 'bet_game', [
            (object)['old' => 'match_id', 'new' => 'game_id', 'after' => null, 'reference_table' => 'games', 'first' => true],
            (object)['old' => 'bet_id', 'new' => 'bet_id', 'after' => 'game_id', 'reference_table' => 'bets', 'first' => false],
        ]);
    }

    private function renameTableFields($oldTable, $newTable, $columns){
        Schema::table($oldTable, function (Blueprint $table) use ($columns){
            foreach ($columns as $key => $column ){
                $table->dropForeign([$column->old]);
                $table->dropColumn($column->old);
            }

        });

        Schema::rename($oldTable, $newTable);

        Schema::table($newTable, function (Blueprint $table) use ($columns) {
            foreach ($columns as $key => $column ){

                if ($column->first){
                    $table->unsignedMediumInteger($column->new)->first();
                } else {
                    $table->unsignedMediumInteger($column->new)->after($column->after);
                }


                $table->foreign($column->new)->references('id')->on($column->reference_table)->onDelete('cascade');
            }
        });
    }
}
