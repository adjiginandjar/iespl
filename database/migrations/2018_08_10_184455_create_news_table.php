<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sone_esports_news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partner_id')->references('id')->on('sone_esports_news_partner');
            $table->string('title');
            $table->string('image');
            $table->string('description');
            $table->string('slug');
            $table->string('link');
            $table->text('content');
            $table->datetime('publish_date');
            $table->string('author');
            $table->string('prismic_uid');
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
        Schema::dropIfExists('sone_esports_news');
    }
}
