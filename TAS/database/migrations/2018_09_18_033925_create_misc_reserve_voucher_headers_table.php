<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiscReserveVoucherHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('misc_reserve_voucher_headers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('misc_voucher_no')->unique();
            $table->integer('tour_quotation_header_id');
            $table->integer('tour_id');
            $table->integer('vpos');
            $table->integer('user_id');
            $table->integer('supplier_id');
            $table->date('confirmed_date');
            $table->string('confirmed_by_name');
            $table->string('client_name');
            $table->string('rates');
            $table->string('remarks');
            $table->tinyInteger('condi');
            $table->integer('pax');
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
        Schema::dropIfExists('misc_reserve_voucher_headers');
    }
}
