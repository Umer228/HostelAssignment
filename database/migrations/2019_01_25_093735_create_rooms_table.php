<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');

            /*Foreign Key Setting*/
            $table->integer('hostel_id')->unsigned();
            $table->foreign('hostel_id')->references('id')->on('hostels')->onDelete('cascade');

            $table->integer('capacity');
            $table->boolean('status');
            $table->boolean('fan');
            $table->boolean('ac');
            $table->boolean('furnished');

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
        Schema::dropIfExists('rooms');
    }
}
