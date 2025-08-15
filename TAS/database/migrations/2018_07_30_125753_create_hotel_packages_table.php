<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id');
            $table->integer('currency_id');
            $table->integer('market_id');
            $table->integer('agent_id');            
            $table->integer('meal_plane_id');
            $table->integer('room_type_id');
            $table->string('Package_name');
            $table->double('extra_bed_charge');
            $table->double('child_rate');
            $table->double('SGL');
            $table->double('DBL');
            $table->double('TBL');
            $table->double('QBL');
            $table->date('from_date');
            $table->date('to_date');
            $table->tinyinteger('ctr_term');
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
        Schema::dropIfExists('hotel_packages');
    }
}
