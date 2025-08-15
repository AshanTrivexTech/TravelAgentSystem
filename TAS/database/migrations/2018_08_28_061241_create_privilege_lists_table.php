<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegeListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privilege_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('privilege_action_id');
            $table->integer('privilege_section_id');
            $table->string('description');
            $table->tinyinteger('status');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privilege_lists');
    }
}
