<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourQuotationTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_quotation_transports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id');
            $table->integer('version_no');
            $table->integer('vehicle_type_id');
            $table->double('millage');
            $table->double('currency_rate');
            $table->double('com_rate');           
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
        Schema::dropIfExists('tour_quotation_transports');
    }
}
