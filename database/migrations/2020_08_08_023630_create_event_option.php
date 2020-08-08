<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventOption extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_option', function (Blueprint $table) {
            $table->unsignedSmallInteger('event_id');
            $table->unsignedSmallInteger('option_id');
            $table->timestamps();
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('option_id')->references('id')->on('options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_option');
    }
}
