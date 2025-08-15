<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourQouteGpVehicleTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_qoute_gp_vehicle_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_quotation_header_id');
            $table->integer('group_qt_pax_setup_id');
            $table->integer('vehicle_type_id');            
            $table->double('rate_per_km');
            $table->integer('extr_vehicle_type_id');
            $table->double('extr_rate_per_km');
            $table->integer('extr_vht_millage');
            $table->double('main_vt_mk_pc');
            $table->double('extr_vt_mk_pc');
            $table->double('exrchg_rate');
            $table->double('pp_rate');
            $table->integer('guide_type');
            $table->integer('guide_accmd');
            $table->integer('accmd_foc');
            
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
        Schema::dropIfExists('tour_qoute_gp_vehicle_types');
    }
}
