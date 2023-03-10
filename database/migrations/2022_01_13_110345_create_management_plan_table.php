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
            $table->unsignedTinyInteger('frequency_id')->nullable();
            $table->Integer('quantity');
            $table->Integer('hours')->nullable();
            $table->unsignedBigInteger('specialty_id')->nullable();
            $table->unsignedBigInteger('admissions_id');
            $table->unsignedBigInteger('procedure_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('authorization_id');
            $table->unsignedBigInteger('assigned_user_id')->nullable();
            $table->string('preparation')->nullable();
            $table->string('route_of_administration')->nullable();
            $table->string('blend')->nullable();
            $table->string('administration_time')->nullable();
            $table->string('number_doses')->nullable();
            $table->Integer('dosage_administer')->nullable();
            $table->boolean('phone_consult');
            $table->longText('observation')->nullable();
            $table->unsignedTinyInteger('status_id')->nullable();
            $table->longText('note')->nullable();
            $table->timestamps();

            $table->index('type_of_attention_id');
            $table->index('frequency_id');
            $table->index('specialty_id');
            $table->index('admissions_id');
            $table->index('assigned_user_id');
            $table->index('procedure_id');
            $table->index('product_id');
            $table->index('authorization_id');

            $table->foreign('type_of_attention_id')->references('id')
                ->on('type_of_attention');
            $table->foreign('frequency_id')->references('id')
                ->on('frequency');
            $table->foreign('specialty_id')->references('id')
                ->on('specialty');
            $table->foreign('admissions_id')->references('id')
                ->on('admissions');
            $table->foreign('assigned_user_id')->references('id')
                ->on('users');
            $table->foreign('product_id')->references('id')
                ->on('services_briefcase');
                $table->foreign('procedure_id')->references('id')
                ->on('services_briefcase');
                $table->foreign('status_id')->references('id')
                ->on('status');
            // $table->foreign('authorization_id')->references('id')
            //     ->on('authorization');
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
