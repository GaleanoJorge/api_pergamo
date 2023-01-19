<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrofacialTlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orofacial_tl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('right_hermiface_symmetry')->nullable();
            $table->longText('right_hermiface_tone')->nullable();
            $table->longText('right_hermiface_sensitivity')->nullable();
            $table->longText('left_hermiface_symmetry')->nullable();
            $table->longText('left_hermiface_tone')->nullable();
            $table->longText('left_hermiface_sensitivity')->nullable();
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
        Schema::dropIfExists('orofacial_tl');
    }
}
