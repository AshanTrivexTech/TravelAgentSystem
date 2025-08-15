<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_allocations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id');
            $table->string('guest_name');
            $table->date('dob');
            $table->string('flight_no');
            $table->string('passport_no');
            $table->date('arrival_date');
            $table->date('depature_date');
            $table->string('remarks');
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
        Schema::dropIfExists('guest_allocations');
    }
}
