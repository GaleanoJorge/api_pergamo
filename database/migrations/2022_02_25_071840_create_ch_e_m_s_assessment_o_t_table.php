<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChEMSAssessmentOTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_e_m_s_assessment_o_t', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('occupational_con');
            $table->string('check1_hold')->nullable();
            $table->string('check2_improve')->nullable();
            $table->string('check3_structure')->nullable();
            $table->string('check4_promote')->nullable();
            $table->string('check5_strengthen')->nullable();
            $table->string('check6_promote_2')->nullable();
            $table->string('check7_develop')->nullable();
            $table->string('check8_strengthen_2')->nullable();
            $table->string('check9_favor')->nullable();
            $table->string('check10_functionality')->nullable();

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
        Schema::dropIfExists('ch_e_m_s_assessment_o_t');
    }
}
