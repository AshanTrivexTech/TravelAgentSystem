<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrnsReserveVoucherHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trns_reserve_voucher_headers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trns_voucher_no');
            $table->integer('tour_quot_trnsport_id');
            $table->integer('tour_id');
            $table->integer('v_pos');
            $table->integer('user_id');
            $table->integer('pax');
            $table->integer('vehicle_type_id');
            $table->string('report_to');
            $table->string('confirm_by');
            $table->string('remarks');
            $table->string('comments');
            $table->date('confirm_date');
            $table->integer('status');
            $table->string('arrival_flight_no');
            $table->string('depature_flight_no');
             $table->date('arrival_time')->nullable();
            $table->date('depature_time')->nullable();

            
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
        Schema::dropIfExists('trns_reserve_voucher_headers');
    }
}
