<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionalSuplimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('optional_supliments', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('hotel_package_id');
            $table->string('ops_code');
            $table->tinyInteger('rate_type');
            $table->double('amt');
            $table->string('des');
            

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
        Schema::dropIfExists('optional_supliments');
    }
}
