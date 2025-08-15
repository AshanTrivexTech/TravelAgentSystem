<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourQuoteGpGuidesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_quote_gp_guides_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_quotation_header_id');
            $table->integer('tour_day'); 
            $table->tinyInteger('gf_ad');
            $table->integer('language_id');
            $table->integer('supplier_id');
            $table->integer('pos');
            $table->double('na_guide_rate');
            $table->double('na_guide_mkp');
            $table->double('ch_guide_rate');
            $table->double('ch_guide_mkp');
            // $table->string('pc_cr_code');
            // $table->double('accmd_rate');
            // $table->double('pc_bs_to_rate');
            $table->double('bsratelkr');
            $table->double('accmd_mkp');
            
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
        Schema::dropIfExists('tour_quote_gp_guides_details');
    }
}
