<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('headline');
            $table->string('image');
            $table->string('path');
            $table->longText('story');
            $table->unsignedBigInteger('south_eastern_id')->index()->nullable();
            $table->unsignedBigInteger('politics_id')->index()->nullable();
            $table->unsignedBigInteger('businesses_id')->index()->nullable();
            $table->unsignedBigInteger('sports_id')->index()->nullable();
            $table->unsignedBigInteger('lifestyles_id')->index()->nullable();
            $table->unsignedBigInteger('national_news_id')->index()->nullable();
            $table->unsignedBigInteger('international_news_id')->index()->nullable();
            $table->unsignedBigInteger('posted_by')->index();
            $table->foreign('posted_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('south_eastern_id')
                ->references('id')
                ->on('south_eastern_news')
                ->onDelete('cascade');
            $table->foreign('national_news_id')
                ->references('id')
                ->on('national_news')
                ->onDelete('cascade');
            $table->foreign('international_news_id')
                ->references('id')
                ->on('international_news')
                ->onDelete('cascade');
            $table->foreign('politics_id')
                ->references('id')
                ->on('politics')
                ->onDelete('cascade');
            $table->foreign('businesses_id')
                ->references('id')
                ->on('businesses')
                ->onDelete('cascade');
            $table->foreign('sports_id')
                ->references('id')
                ->on('sports')
                ->onDelete('cascade');
            $table->foreign('lifestyles_id')
                ->references('id')
                ->on('lifestyles')
                ->onDelete('cascade');
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
        Schema::dropIfExists('news');
    }
};
