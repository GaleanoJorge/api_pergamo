<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateChSwRiskFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_sw_risk_factors', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('net')->nullable();
            $table->string('spa')->nullable();
            $table->string('violence')->nullable();
            $table->string('victim')->nullable();
            $table->string('economic')->nullable();
            $table->string('living')->nullable();
            $table->string('attention')->nullable();
            $table->string('stigmatization')->nullable();
            $table->string('interference')->nullable();
            $table->string('spaces')->nullable();                        
            $table->string('observations')->nullable();
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
        Schema::dropIfExists('ch_sw_risk_factors');
    }
}
