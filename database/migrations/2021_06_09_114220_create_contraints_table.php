<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContraintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
        });
        Schema::table('vips', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('streaks', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('histories', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('learneds', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('lesson_id')->references('id')->on('lessons');
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('vocabulary_id')->references('id')->on('vocabularies');
        });
        Schema::table('lessons', function (Blueprint $table) {
            $table->foreign('level_id')->references('id')->on('levels');
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('lesson_id')->references('id')->on('lessons');
        });
        Schema::table('lessons_questions', function (Blueprint $table) {
            $table->foreign('lesson_id')->references('id')->on('lessons');
            $table->foreign('question_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });
        Schema::table('vips', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('streaks', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('histories', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('learneds', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['lesson_id']);
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['vocabulary_id']);
        });
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropForeign(['level_id']);
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['lesson_id']);
        });
        Schema::table('lessons_questions', function (Blueprint $table) {
            $table->dropForeign(['lesson_id']);
            $table->dropForeign(['question_id']);
        });
    }
}