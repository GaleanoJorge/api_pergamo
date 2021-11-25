<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('admission_route_id');
            $table->unsignedtinyInteger('campus_id');
            $table->unsignedBigInteger('scope_of_attention_id');
            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('pavilion_id');
            $table->unsignedBigInteger('flat_id');
            $table->unsignedBigInteger('bed_id');
            $table->unsignedBigInteger('contract_id');
            $table->unsignedBigInteger('diagnosis_id');
            $table->dateTime('entry_date');
            $table->dateTime('discharge_date');
            $table->dateTime('medical_date');
            $table->unsignedBigInteger('user_id');

            
            $table->timestamps();

            $table->index('admission_route_id');
            $table->foreign('admission_route_id')->references('id')
            ->on('admission_route');
            $table->index('campus_id');
            $table->foreign('campus_id')->references('id')
            ->on('campus');
            $table->index('scope_of_attention_id');
            $table->foreign('scope_of_attention_id')->references('id')
            ->on('scope_of_attention');
            $table->index('program_id');
            $table->foreign('program_id')->references('id')
            ->on('program');
            $table->index('pavilion_id');
            $table->foreign('pavilion_id')->references('id')
            ->on('pavilion');
            $table->index('flat_id');
            $table->foreign('flat_id')->references('id')
            ->on('flat');
            $table->index('bed_id');
            $table->foreign('bed_id')->references('id')
            ->on('bed');
            $table->index('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users');
            $table->index('contract_id');
            $table->foreign('contract_id')->references('id')
            ->on('contract');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admissions');
    }
}
