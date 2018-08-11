<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sone_esports_match', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->nullable();
            $table->integer('league_id')->references('id')->on('sone_esports_league');;
            $table->integer('game_id')->references('id')->on('sone_esports_game');;
            $table->integer('home_team_id')->references('id')->on('sone_esports_team');;
            $table->integer('away_team_id')->references('id')->on('sone_esports_team');;
            $table->integer('home_score');
            $table->integer('away_score');
            $table->datetime('kick_off');
            $table->boolean('live');
            $table->text('vod_embed')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('another_link')->nullable();
            $table->integer('yamisok_id')->nullable();
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
        Schema::dropIfExists('sone_esports_match');
    }
}
