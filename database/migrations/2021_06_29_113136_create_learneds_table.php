<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learneds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('lesson_id');
            $table->boolean('status_learned')->default(0);
            $table->boolean('status_buy')->default(0);
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
        Schema::dropIfExists('learneds');
    }
}