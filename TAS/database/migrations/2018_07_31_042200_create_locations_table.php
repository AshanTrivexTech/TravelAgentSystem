<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id');
            $table->integer('district_id');
            $table->string('location_name');
            $table->string('location_code');
            $table->string('long_name')->nullable();
            $table->string('geo_name')->nullable();
            $table->string('narration')->nullable();
            $table->string('short_des')->nullable();
            $table->integer('status');
            $table->tinyInteger('ss');
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
        Schema::dropIfExists('locations');
    }
}
