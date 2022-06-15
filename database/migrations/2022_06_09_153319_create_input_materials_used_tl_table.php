<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputMaterialsUsedTlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_materials_used_tl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('biosecurity_elements');
            $table->string('didactic_materials');
            $table->string('liquid_food');
            $table->string('stationery');
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

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
        Schema::dropIfExists('input_materials_used_tl');
    }
}
