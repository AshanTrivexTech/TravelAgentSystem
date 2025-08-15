<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourQuotTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_quot_transports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_quotation_header_id');
            $table->integer('tour_id');
            $table->integer('pos');
            $table->integer('vehicle_type_id');
            $table->double('millage');
            $table->double('rate_pkm');
            $table->double('totlkr');
            $table->double('trp_ls_Mkp');
            $table->double('baserate');            
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
        Schema::dropIfExists('tour_quot_transports');
    }
}
