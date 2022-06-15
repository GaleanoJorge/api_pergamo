<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChRouteFluidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_route_fluid', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('type'); // 0 for administration - 1 for elimination
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
        Schema::dropIfExists('ch_route_fluid');
    }
}
