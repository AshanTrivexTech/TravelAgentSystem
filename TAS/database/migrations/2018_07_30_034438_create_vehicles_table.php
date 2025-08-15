<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('supplier_id')->unsigned()->nullable()->index();
            $table->integer('vehicle_type_id')->unsigned()->nullable()->index();           
            $table->string('reg_no');
            $table->date('licence_exp_date');
            $table->date('insurance_exp_date');
            $table->integer('mf_year');
            $table->integer('reg_year');
            $table->string('remarks');
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
        Schema::dropIfExists('vehicles');
    }
}
