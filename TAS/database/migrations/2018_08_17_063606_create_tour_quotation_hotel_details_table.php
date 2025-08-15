<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourQuotationHotelDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_quotation_hotel_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_quotation_hotel_id');
            $table->integer('tour_id');
            $table->integer('pos');
            $table->integer('supplier_id');            
            $table->integer('hotel_package_id');            
            $table->double('ss_rate');
            $table->double('ss_com');
            $table->double('db_rate');
            $table->double('db_com');
            $table->double('trp_rate');
            $table->double('trp_com');
            $table->double('qtb_rate');
            $table->double('qtb_com');
            $table->double('sql_splm');
            $table->double('dbl_splm');
            $table->double('tbl_splm');
            $table->double('qd_splm');
            $table->double('child_rate');
            $table->double('child_com');
            $table->double('guide');            
            $table->integer('currency_id');
            $table->double('rate_to_base');
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
        Schema::dropIfExists('tour_quotation_hotel_details');
    }
}
