
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentabilityTcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentability_tc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cost_center');
            $table->string('cc1');
            $table->string('cc2');
            $table->string('cc3');
            $table->string('cc4');
            $table->string('area1');
            $table->string('area2');
            $table->string('area3');
            $table->string('area4');
            $table->string('name_cost_center');
            $table->string('bill');
            $table->string('name_bill');
            $table->string('value');
            $table->string('month');
            $table->string('year');
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
        Schema::dropIfExists('rentability_tc');
    }
}
