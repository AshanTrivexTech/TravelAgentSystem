<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourQuotationSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_quotation_suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id');
            $table->integer('supplier_id');
            $table->string('sup_type');
            $table->string('sup_name');
            $table->integer('version_no');            
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
        Schema::dropIfExists('tour_quotation_suppliers');
    }
}
