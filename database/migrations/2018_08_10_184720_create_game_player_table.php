<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamePlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sone_esports_game_player', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('game_id')->references('id')->on('sone_esports_game');
            $table->integer('player_id')->references('id')->on('sone_esports_player');
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
        Schema::dropIfExists('sone_esports_game_player');
    }
}
