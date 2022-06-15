<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificTestsTlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specific_tests_tl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hamilton_scale')->nullable();
            $table->string('boston_test')->nullable();
            $table->string('termal_merril')->nullable();
            $table->string('prolec_plon')->nullable();
            $table->string('ped_guss')->nullable();
            $table->string('vhi_grbas')->nullable();
            $table->string('pemo_speech')->nullable();
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
        Schema::dropIfExists('specific_tests_tl');
    }
}
