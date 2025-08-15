<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuideHotelVoucherHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guide_hotel_voucher_headers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guide_hotel_voucher_no');
            $table->integer('tour_quotation_header_id');
            $table->integer('tour_id');
            $table->integer('vpos');
            $table->integer('user_id');
            $table->integer('supplier_id');
            $table->datetime('confirmed_date');
            $table->string('confirmed_by_name');
            $table->string('rates');
            $table->string('remarks');
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
        Schema::dropIfExists('guide_hotel_voucher_headers');
    }
}
