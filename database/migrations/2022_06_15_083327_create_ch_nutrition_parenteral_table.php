<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChNutritionParenteralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_nutrition_parenteral', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('protein_contributions')->nullable();
            $table->double('carbohydrate_contribution')->nullable();
            $table->double('lipid_contribution')->nullable();
            $table->double('amino_acid_volume')->nullable();
            $table->string('ce_se')->nullable();
            $table->double('dextrose_volume')->nullable();
            $table->double('lipid_volume')->nullable();
            $table->double('total_grams_of_protein')->nullable();
            $table->double('grams_of_nitrogen')->nullable();
            $table->double('total_carbohydrates')->nullable();
            $table->double('total_grams_of_lipids')->nullable();
            $table->double('total_amino_acid_volume')->nullable();
            $table->double('total_dextrose_volume')->nullable();
            $table->double('total_lipid_volume')->nullable();
            $table->double('total_calories')->nullable();
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
        Schema::dropIfExists('ch_nutrition_parenteral');
    }
}
