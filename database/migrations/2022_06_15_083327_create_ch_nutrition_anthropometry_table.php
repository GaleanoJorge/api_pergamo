<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChNutritionAnthropometryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_nutrition_anthropometry', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_functional')->nullable();
            $table->double('weight')->nullable();
            $table->double('size')->nullable();
            $table->double('arm_circunferency')->nullable();
            $table->double('calf_circumference')->nullable();
            $table->double('knee_height')->nullable();
            $table->double('abdominal_perimeter')->nullable();
            $table->double('hip_perimeter')->nullable();
            $table->double('geteratedIMC')->nullable();
            $table->string('classification')->nullable();
            $table->double('estimated_weight')->nullable();
            $table->double('estimated_size')->nullable();
            $table->double('total_energy_expenditure')->nullable();
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
        Schema::dropIfExists('ch_nutrition_anthropometry');
    }
}
