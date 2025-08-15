<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationMiscsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_miscs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_quote_misc_id');
            $table->integer('supplier_id');
            $table->tinyInteger('advance');
            $table->tinyInteger('status');
            $table->integer('pos');
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
        Schema::dropIfExists('reservation_miscs');
    }
}
