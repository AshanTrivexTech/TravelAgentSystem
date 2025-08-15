<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourBookingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_booking_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id');
            // $table->integer('tour_code');
            $table->integer('tour_ammd_id');
            $table->integer('tour_ammd');
            $table->tinyInteger('tour_ammd_type');
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
        Schema::dropIfExists('tour_booking_lists');
    }
}
