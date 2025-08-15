<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
   

    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('code');
            $table->string('sup_s_name')->nullable();
            $table->string('sup_name');
            $table->string('type');
            $table->string('address')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('status'); 

            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('suppliers');
        
    }
}
