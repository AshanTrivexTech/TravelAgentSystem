<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourQuoteRoomAllocationsTable extends Migration
{
    
    public function up()
    {
        Schema::create('tour_quote_room_allocations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id');
            $table->integer('sgl');
            $table->integer('dbl');
            $table->integer('twn');
            $table->integer('tbl');
            $table->integer('qd');            
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('tour_quote_room_allocations');
    }
}
