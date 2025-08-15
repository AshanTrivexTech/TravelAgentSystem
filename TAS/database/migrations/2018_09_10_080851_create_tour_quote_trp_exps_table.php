<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourQuoteTrpExpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_quote_trp_exps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_quotation_header_id');
            $table->integer('tour_id');
            $table->integer('pos');
            $table->integer('transport_expense_id');
            $table->double('exp_rate');
            $table->integer('exp_qty');
            $table->double('exp_total');
            $table->double('exp_markup');
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
        Schema::dropIfExists('tour_quote_trp_exps');
    }
}
