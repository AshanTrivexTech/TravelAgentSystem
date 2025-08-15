<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourQuotDistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_quot_distances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_quot_location_id');
            $table->integer('tour_id');
            $table->integer('pos');
            $table->integer('location_id');
            $table->string('lc_name');
            $table->string('lc_code');            
            $table->double('kms');
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
        Schema::dropIfExists('tour_quot_distances');
    }
}
