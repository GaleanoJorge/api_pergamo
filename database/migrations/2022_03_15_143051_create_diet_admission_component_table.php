<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietAdmissionComponentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_admission_component', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('diet_admission_id');
            $table->unsignedBigInteger('diet_component_id');
            $table->timestamps();

            $table->index('diet_admission_id');
            $table->index('diet_component_id');

            $table->foreign('diet_admission_id')->references('id')
                ->on('diet_admission');
            $table->foreign('diet_component_id')->references('id')
                ->on('diet_component');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diet_admission_component');
    }
}
