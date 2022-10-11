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
        Schema::create('courses', function (Blueprint $table) {
            $table->id('course_id');
            $table->string('course_name',30)->unique();
            $table->string('course_code',30)->unique();
            $table->unsignedBigInteger('credit_id');
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('credit_id')->references('credit_id')->on('credits');
            $table->foreign('teacher_id')->references('teacher_id')->on('teachers');
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
        Schema::dropIfExists('courses');
    }
};
