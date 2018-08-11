<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sone_esports_player', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->references('id')->on('sone_esports_team');
            $table->integer('game_id')->references('id')->on('sone_esports_game');
            $table->string('name')->nullable();
            $table->string('nick')->nullable();
            $table->string('country');
            $table->string('url');
            $table->boolean('leader');
            $table->boolean('feature')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('image')->nullable();
            $table->string('cover')->nullable();
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
        Schema::dropIfExists('sone_esports_player');
    }
}
