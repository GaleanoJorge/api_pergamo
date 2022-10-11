<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChNRMaterialsFTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_n_r_materials_f_t', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Material_1')->nullable();
            $table->string('Material_2')->nullable();
            $table->string('Material_3')->nullable();
            $table->string('Material_4')->nullable();
            $table->string('Material_5')->nullable();
            $table->string('Material_6')->nullable();
            $table->string('Material_7')->nullable();
            $table->string('Material_8')->nullable();
            $table->string('Material_9')->nullable();
            $table->string('Material_10')->nullable();
            $table->string('Material_11')->nullable();
            $table->string('Material_12')->nullable();
            $table->string('Material_13')->nullable();
            $table->string('Material_14')->nullable();
            $table->string('Material_15')->nullable();
            $table->string('Material_16')->nullable();
            $table->string('Material_17')->nullable();
            $table->string('Material_18')->nullable();
            $table->string('Material_19')->nullable();
            $table->string('Material_20')->nullable();
            $table->string('Material_21')->nullable();
            $table->string('Material_22')->nullable();
            $table->string('Material_23')->nullable();
            $table->string('Material_24')->nullable();
            $table->string('Material_25')->nullable();
            $table->string('Material_26')->nullable();
            $table->string('Material_27')->nullable();
            $table->string('Material_28')->nullable();
            $table->string('Material_29')->nullable();

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
        Schema::dropIfExists('ch_n_r_materials_f_t');
    }
}
