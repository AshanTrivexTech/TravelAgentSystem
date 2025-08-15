<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourQuotMiscsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_quot_miscs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_quotation_header_id');
            $table->integer('tour_id');
            $table->integer('pos');
            $table->integer('misc_categorie_id');
            $table->double('qty');      
            $table->double('rate_lkr');
            $table->double('totlkr');
            $table->double('ms_Mkp');
            $table->double('baserate'); 
            $table->double('ex_rate'); 
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
        Schema::dropIfExists('tour_quot_miscs');
    }
}
