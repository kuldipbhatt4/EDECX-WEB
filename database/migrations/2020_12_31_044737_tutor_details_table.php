<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TutorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tid');
            $table->string('sid')->nullable();
            $table->string('lid')->nullable();
            $table->string('classid')->nullable();
            $table->string('tutor_image')->nullable();
            $table->integer('gender')->nullable();
            $table->date('tutor_dob')->nullable();
            $table->integer('experience')->nullable();
            $table->text('description')->nullable();
            $table->string('ugra_college')->nullable();
            $table->string('gra_college')->nullable();
            $table->string('ugra_major')->nullable();
            $table->string('gra_major')->nullable();
            $table->string('typedegree')->nullable();
            $table->string('city')->nullable();
            $table->integer('hrprice')->nullable();
            $table->integer('urearning')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('remail_noti')->default('1');
            $table->integer('rupcoming_noti')->default('1');
            $table->integer('rupdates_noti')->default('1');
            $table->rememberToken();
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
        Schema::dropIfExists('tutor_details');
    }
}
