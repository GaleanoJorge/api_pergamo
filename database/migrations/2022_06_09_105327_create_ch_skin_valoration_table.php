<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChSkinValorationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_skin_valoration', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('diagnosis_id');
            $table->unsignedBigInteger('body_region_id');
            $table->unsignedBigInteger('skin_status_id');
            $table->string('pressure_ulcers')->nullable();
            $table->string('exudate')->nullable();
            $table->string('concentrated')->nullable();
            $table->string('infection_sign')->nullable();
            $table->string('surrounding_skin')->nullable();
            $table->longText('observation')->nullable();
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

            $table->index('diagnosis_id');
            $table->foreign('diagnosis_id')->references('id')
                ->on('diagnosis');

            $table->index('body_region_id');
            $table->foreign('body_region_id')->references('id')
                ->on('body_region');

            $table->index('skin_status_id');
            $table->foreign('skin_status_id')->references('id')
                ->on('skin_status');

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
        Schema::dropIfExists('ch_skin_valoration');
    }
}
