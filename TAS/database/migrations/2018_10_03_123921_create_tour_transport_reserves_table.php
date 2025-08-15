 <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourTransportReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_transport_reserves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_type_id');
            $table->integer('driver_id');
            $table->integer('supplier_id');
            $table->integer('vehicle_id');
            $table->integer('transport_reserve_id');
            $table->integer('tour_id');
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
        Schema::dropIfExists('tour_transport_reserves');
    }
}
