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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id('registration_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('student_id');
            $table->integer('payable_amount')->nullable();
            $table->enum('status',['1','2','0'])->default(0);
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign("course_id")->references("course_id")->on("courses");
            $table->foreign("department_id")->references("department_id")->on("departments");
            $table->foreign("semester_id")->references("semester_id")->on("semesters");
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
        Schema::dropIfExists('registrations');
    }
};
