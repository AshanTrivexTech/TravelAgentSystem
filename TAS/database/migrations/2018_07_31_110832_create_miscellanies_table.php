<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiscellaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miscellanies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id');
            $table->integer('misc_categorie_id')->foreign('misc_categorie_id')->references('id')->on('misc_categorie');
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
        Schema::dropIfExists('miscellanies');

    }
}
