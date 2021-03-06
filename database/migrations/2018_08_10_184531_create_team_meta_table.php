<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sone_esports_team_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->references('id')->on('sone_esports_team');
            $table->string('meta_key');
            $table->text('meta_value');
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
        Schema::dropIfExists('sone_esports_team_meta');
    }
}
