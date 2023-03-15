<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHumanTalent2TcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('human_talent_2_tc', function (Blueprint $table) {
            $table->string('full_name');
            $table->string('identification');
            $table->string('document_type');
            $table->string('gender');
            $table->string('age');
            $table->integer('honorary');
            $table->string('type_of_contract');
            $table->string('type_of_job');
            $table->string('ambit');
            $table->string('cost_center');
            $table->string('cost_center_code');
            $table->string('position');
            $table->string('area');
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
        Schema::dropIfExists('human_talent_2_tc');
    }
}
