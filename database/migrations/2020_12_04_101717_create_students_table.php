<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('middle_name');
            $table->string('lname');
            $table->dateTime('student_dob');
            $table->integer('gender');
            $table->string('address');
            $table->string('street_address');
            $table->string('street_address_line2');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('email');
            $table->string('mobile_no');
            $table->string('phone_no');
            $table->string('work_no');
            $table->string('password');
            $table->string('subject');
            $table->string('level');
            $table->integer('otp')->nullable();
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
        Schema::dropIfExists('students');
    }
}
