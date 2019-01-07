<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Reservation(id{PK},id_customer{FK},id_room{FK},
        //date,start_hour,end_hour,description,note,status)
        Schema::create('reservations',function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_customer');
            $table->integer('id_room');
            $table->date('date');
            $table->time('start_hour');
            $table->time('end_hour');
            $table->string('description');
            $table->string('note');
            $table->string('status');
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
        Schema::drop('reservations');
    }
}
