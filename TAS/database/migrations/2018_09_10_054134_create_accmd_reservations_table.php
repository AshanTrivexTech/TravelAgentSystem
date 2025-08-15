<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccmdReservationsTable extends Migration
{
    /** 
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accmd_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_quotation_hotel_detail_id');
            $table->integer('sgl_qty');
            $table->integer('dbl_qty');
            $table->integer('twn_qty');
            $table->integer('tbl_qty');
            $table->integer('qd_qty');
            $table->double('total_sup');
            $table->double('total_rmc');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('accmd_reservations');
    }
}
