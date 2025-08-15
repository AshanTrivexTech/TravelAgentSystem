<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourQuotationHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_quotation_headers', function (Blueprint $table) {
           
            $table->increments('id');
            $table->integer('tour_id')->unique();
            $table->string('tour_code');
            $table->integer('tour_code_no');
            $table->integer('market_id');
            $table->integer('agent_id');
            $table->integer('branch_id');
            $table->integer('version_id');
            $table->integer('version_no')->default(1);
            $table->integer('user_id');
            $table->integer('tour_type');            
            $table->string('title');
            $table->date('frm_date');
            $table->date('to_date');
            $table->date('vld_frm_date');
            $table->date('vld_to_date');
            $table->integer('Days');
            $table->integer('pax_adult');
            $table->integer('pax_child');
            $table->string('remarks')->nullable();
            $table->integer('currency_id');
            $table->double('vat_rate')->nullable();
            $table->double('millage')->nullable();
            $table->double('tot_hotel_price')->nullable();
            $table->double('trp_pp_price')->nullable();
            $table->double('tot_misc_price')->nullable();
            $table->double('pp_misc_price')->nullable();            
            $table->double('tot_guide_price')->nullable();
            $table->double('tot_guide_acmd')->nullable();
            $table->double('pp_rate')->nullable();
            $table->double('pp_hotel_price')->nullable();
            $table->double('pp_ss_price')->nullable();
            $table->double('pp_tpre_price')->nullable();
            $table->double('pp_qtre_price')->nullable();            
            $table->double('com_rate')->nullable();
            $table->tinyInteger('qtn_type')->nullable();
            $table->tinyInteger('promotion');
            $table->tinyInteger('confirmed');            
            $table->tinyInteger('amgmt');
            $table->tinyInteger('base_on');
            $table->double('bc_to_lkr');
            $table->double('child_pp_rate');
            $table->tinyInteger('status');
            $table->tinyInteger('child_chk_accmd');
            $table->tinyInteger('child_chk_trsp');
            $table->tinyInteger('child_chk_guide');
            $table->tinyInteger('child_chk_misc');
                  
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
        Schema::dropIfExists('tour_quotation_headers');
    }
}
