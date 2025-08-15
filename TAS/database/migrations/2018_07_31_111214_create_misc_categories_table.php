<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiscCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('misc_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('currencie_id');
            $table->integer('misc_rate_categorie_id');
            $table->string('category');
            $table->integer('mc_pax');
            $table->double('Rate');
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
        Schema::dropIfExists('misc_categories');
    }
}
