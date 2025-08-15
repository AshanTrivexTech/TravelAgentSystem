<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentInvHeadersTable extends Migration
{
  
    public function up()
    {
        Schema::create('agent_inv_headers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inv_no');
            $table->integer('amd_no');
            $table->integer('tour_id');
            $table->integer('user_id');
            $table->double('total_amount');
            $table->string('remarks');
            $table->date('inv_date');
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
        Schema::dropIfExists('agent_inv_headers');
    }
}
