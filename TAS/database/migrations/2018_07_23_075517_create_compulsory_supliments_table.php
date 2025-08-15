<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompulsorySuplimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compulsory_supliments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id');
            $table->integer('currency_id');
            $table->string('cs_code');
            $table->tinyInteger('rate_type');
            $table->double('amt');
            $table->date('fr_date');
            $table->date('to_date');
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
        Schema::dropIfExists('compulsory_supliments');
    }
}
