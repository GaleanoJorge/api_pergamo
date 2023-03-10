<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateChSwHygieneHousingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_sw_hygiene_housing', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('cleanliness');
            $table->longText('obs_cleanliness');
            $table->string('illumination');
            $table->longText('obs_illumination');
            $table->string('ventilation');
            $table->longText('obs_ventilation');
            $table->string('pests');
            $table->longText('obs_pests');
            $table->string('sanitary');
            $table->longText('obs_sanitary');
            $table->string('trash');
            $table->longText('obs_trash');
            
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
        Schema::dropIfExists('ch_sw_hygiene_housing');
    }
}
