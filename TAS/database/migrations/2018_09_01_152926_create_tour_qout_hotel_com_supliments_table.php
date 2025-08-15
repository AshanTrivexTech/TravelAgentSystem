<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourQoutHotelComSuplimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_qout_hotel_com_supliments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_quotation_hotel_detail_id');
            $table->integer('tour_id');
            $table->integer('spos');
            $table->integer('compulsory_supliment_id');
            $table->integer('rate_type');
            $table->double('exrate');
            $table->double('csup_amount');
            $table->integer('qty');
            $table->tinyInteger('cheked');
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
        Schema::dropIfExists('tour_qout_hotel_com_supliments');
    }
}
