<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FcontactusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcontactus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contactno');
            $table->string('emailid');
            $table->string('address');
            $table->string('maplink');
            $table->string('fabout');
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
         Schema::dropIfExists('fcontactus');
    }
}
