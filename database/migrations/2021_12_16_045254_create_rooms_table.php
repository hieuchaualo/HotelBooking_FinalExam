<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('image');          
            $table->integer('hotel_id') -> unsigned();
            $table->foreign('hotel_id') -> references('id') -> on('hotels') -> onDelete('cascade');
            $table->integer('type_id') -> unsigned();
            $table->foreign('type_id') -> references('id') -> on('type_rooms') -> onDelete('cascade');
            $table->integer('price');
            $table->text('description');
            $table->text('status');
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
        Schema::dropIfExists('rooms');
    }
}
