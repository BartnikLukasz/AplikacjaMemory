<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingleGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_game', function (Blueprint $table) {
            $table->id();
            $table->integer('time');
            $table->foreignId('level_difficulty_id')->constrained('level_difficulty');
            $table->foreignId('user_id')->constrained('user');
            $table->integer('scores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('single_game');
    }
}
