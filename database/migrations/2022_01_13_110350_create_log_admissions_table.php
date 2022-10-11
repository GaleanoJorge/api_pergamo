<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_admissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->unsignedBigInteger('admissions_id')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->index('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users');

            $table->index('patient_id');
            $table->foreign('patient_id')->references('id')
                ->on('patients');

            $table->index('admissions_id');
            $table->foreign('admissions_id')->references('id')
                ->on('admissions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_admissions');
    }
}
