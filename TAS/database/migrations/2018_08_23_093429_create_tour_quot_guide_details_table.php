<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourQuotGuideDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_quot_guide_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_quot_guide_id');
            $table->integer('tour_id');
            $table->integer('pos');
            $table->integer('guide_type_id');
            $table->integer('language_id');
            $table->tinyInteger('has_room');
            $table->integer('guide_room_id');
            $table->double('guide_fee');
            $table->double('guide_com');
            $table->double('room_rate');
            $table->double('room_excrate');
            $table->double('room_com');
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
        Schema::dropIfExists('tour_quot_guide_details');
    }
}
