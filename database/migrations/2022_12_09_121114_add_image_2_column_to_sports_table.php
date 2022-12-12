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
        Schema::table('sports', function (Blueprint $table) {
            //
            $table->string('image_one')->nullable();
            $table->string('path_one')->nullable();
            $table->longText('story_one')->nullable();
            $table->string('url')->nullable();
            $table->longText('story_two')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sports', function (Blueprint $table) {
            //
            $table->dropColumn('image_one');
            $table->dropColumn('path_one');
            $table->dropColumn('story_one');
            $table->dropColumn('url');
            $table->dropColumn('story_two');
        });
    }
};
