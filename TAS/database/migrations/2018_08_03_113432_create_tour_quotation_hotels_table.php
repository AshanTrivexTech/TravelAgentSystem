<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourQuotationHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_quotation_hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_quotation_header_id');
            $table->integer('tour_id');            
            $table->date('tour_date');
            $table->integer('tour_day');     
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
        Schema::dropIfExists('tour_quotation_hotels');
    }
}
