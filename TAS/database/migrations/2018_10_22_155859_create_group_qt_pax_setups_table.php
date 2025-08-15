<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupQtPaxSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_qt_pax_setups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_type_id');
            $table->integer('pax_frm');
            $table->integer('pax_to');
            $table->integer('guide_accmd_add');
            $table->integer('guide_type');
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
        Schema::dropIfExists('group_qt_pax_setups');
    }
}
