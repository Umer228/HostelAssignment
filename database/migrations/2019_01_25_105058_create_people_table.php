<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');

            /*Foreign Key Setting*/
            $table->integer('hostel_id')->unsigned();
            $table->foreign('hostel_id')->references('id')->on('hostels');

            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms');

            $table->string('name');
            $table->bigInteger('cnic')->nullable();
            $table->string('address');

            $table->timestamps();
            $table->softDeletes();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
