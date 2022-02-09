<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management_plan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('type_of_attention_id');
            $table->unsignedTinyInteger('frequency_id');
            $table->Integer('quantity');
            $table->unsignedBigInteger('special_field_id')->nullable();
            $table->unsignedBigInteger('admissions_id');
            $table->unsignedBigInteger('assigned_user_id');
            $table->timestamps();
        
            $table->index('type_of_attention_id');
            $table->index('frequency_id');
            $table->index('special_field_id');
            $table->index('admissions_id');
            $table->index('assigned_user_id');

            $table->foreign('type_of_attention_id')->references('id')
                ->on('type_of_attention');
            $table->foreign('frequency_id')->references('id')
                ->on('frequency');
            $table->foreign('special_field_id')->references('id')
                ->on('special_field');
            $table->foreign('admissions_id')->references('id')
                ->on('admissions');
             $table->foreign('assigned_user_id')->references('id')
                ->on('users');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('management_plan');
    }
}
