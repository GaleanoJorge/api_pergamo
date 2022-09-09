<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateChSwHousingAspectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_sw_housing_aspect', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('flat')->nullable();
            $table->string('lift')->nullable();
            $table->string('location');
            $table->string('vehicle_access');
            $table->unsignedBigInteger('ch_sw_housing_type_id');
            $table->unsignedBigInteger('ch_sw_housing_id');
            
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');

            $table->timestamps();

            $table->index('ch_sw_housing_type_id');
            $table->foreign('ch_sw_housing_type_id')->references('id')
                ->on('ch_sw_housing_type');

            $table->index('ch_sw_housing_id');
            $table->foreign('ch_sw_housing_id')->references('id')
                ->on('ch_sw_housing');

            $table->index('type_record_id');
            $table->foreign('type_record_id')->references('id')
                ->on('type_record');

            $table->index('ch_record_id');
            $table->foreign('ch_record_id')->references('id')
                ->on('ch_record');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ch_sw_housing_aspect');
    }
}
