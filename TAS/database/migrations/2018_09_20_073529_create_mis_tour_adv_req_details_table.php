<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMisTourAdvReqDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mis_tour_adv_req_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mis_tour_adv_req_header_id');
            $table->integer('reservation_misc_id');
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
        Schema::dropIfExists('mis_tour_adv_req_details');
    }
}
