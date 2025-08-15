<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMisTourAdvReqHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mis_tour_adv_req_headers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('misc_voucher_no');
            $table->integer('tour_quotation_header_id');
            $table->integer('tour_id');
            $table->integer('vpos');
            $table->integer('user_id');
            $table->integer('supplier_id');
            $table->string('remarks');
            $table->string('Requested_For');
            $table->date('Required_Date');
            $table->date('Settlement_Date');
            $table->integer('status');
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
        Schema::dropIfExists('mis_tour_adv_req_headers');
    }
}
