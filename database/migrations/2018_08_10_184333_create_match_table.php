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
            $table->string('url');
            $table->integer('league_id');
            $table->integer('game_id');
            $table->integer('home_team_id');
            $table->integer('away_team_id');
            $table->integer('home_score');
            $table->integer('away_score');
            $table->datetime('kick_off');
            $table->boolean('live');
            $table->text('vod_embed');
            $table->string('youtube_link');
            $table->string('another_link');
            $table->int('yamisok_id');
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
