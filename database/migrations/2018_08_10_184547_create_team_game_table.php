<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sone_esports_team_game', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->references('id')->on('sone_esports_team');
            $table->integer('game_id')->references('id')->on('sone_esports_game');
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
        Schema::dropIfExists('sone_esports_team_game');
    }
}
