<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChRNMaterialsOTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_r_n_materials_o_t', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('check1_cognitive')->nullable();
            $table->string('check2_colors')->nullable();
            $table->string('check3_elements')->nullable();
            $table->string('check4_balls')->nullable();
            $table->string('check5_material_paper')->nullable();
            $table->string('check6_material_didactic')->nullable();
            $table->string('check7_computer')->nullable();
            $table->string('check8_clay')->nullable();
            $table->string('check9_colbon')->nullable();
            $table->string('check10_pug')->nullable();

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
        Schema::dropIfExists('ch_r_n_materials_o_t');
    }
}
