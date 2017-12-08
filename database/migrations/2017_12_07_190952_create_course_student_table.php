<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseStudentTable extends Migration
{

    public function up()
    {
        Schema::create('course_student', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('course_id')->unsigned();
            $table->integer('student_id')->unsigned();

            # foreign keys
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_student');
    }
}
