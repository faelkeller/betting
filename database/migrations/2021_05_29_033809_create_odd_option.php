<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOddOption extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odd_option', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('odd_id');
            $table->unsignedSmallInteger('option_id');
            $table->decimal('odd', 7, 2);
            $table->timestamps();
            $table->foreign('odd_id')->references('id')->on('odds')->onDelete('cascade');
            $table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('odd_option');
    }
}

