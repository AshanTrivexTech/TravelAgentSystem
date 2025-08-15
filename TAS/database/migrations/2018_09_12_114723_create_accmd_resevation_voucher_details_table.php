<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccmdResevationVoucherDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accmd_resevation_voucher_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('accmd_resevation_voucher_header_id');
            $table->integer('accmd_reservation_id');
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
        Schema::dropIfExists('accmd_resevation_voucher_details');
    }
}
