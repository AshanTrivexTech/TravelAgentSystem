<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuideHotelVoucherDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guide_hotel_voucher_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guide_hotel_voucher_header_id');
            $table->integer('guide_hotel_reserve_id');
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
        Schema::dropIfExists('guide_hotel_voucher_details');
    }
}
