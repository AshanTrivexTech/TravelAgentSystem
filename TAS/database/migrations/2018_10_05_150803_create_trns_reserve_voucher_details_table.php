<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrnsReserveVoucherDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trns_reserve_voucher_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trns_reserve_voucher_header_id');
            $table->integer('tour_transport_reserve_id');
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
        Schema::dropIfExists('trns_reserve_voucher_details');
    }
}
