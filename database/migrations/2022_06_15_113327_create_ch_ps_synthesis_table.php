<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChPsSynthesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_ps_synthesis', function (Blueprint $table) {
            $table->bigIncrements('id');   

            $table->string('psychomotricity');
            $table->string('observations_psy');
            $table->string('introspection');
            $table->string('observations_in');
            $table->unsignedBigInteger('ch_ps_judgment_id');
            $table->string('observations_jud');
            $table->unsignedBigInteger('ch_ps_prospecting_id');
            $table->string('observations_pros');
            $table->unsignedBigInteger('ch_ps_intelligence_id');
            $table->string('observations_inte');

            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');

            $table->timestamps();


            $table->index('ch_ps_judgment_id');
            $table->foreign('ch_ps_judgment_id')->references('id')
                ->on('ch_ps_judgment');

            $table->index('ch_ps_prospecting_id');
            $table->foreign('ch_ps_prospecting_id')->references('id')
                ->on('ch_ps_prospecting');

            $table->index('ch_ps_intelligence_id');
            $table->foreign('ch_ps_intelligence_id')->references('id')
                ->on('ch_ps_intelligence');
           
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
        Schema::dropIfExists('ch_ps_synthesis');
    }
}
