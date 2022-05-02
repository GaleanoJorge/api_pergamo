<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReasonConsultationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reason_consultation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('admissions_id');
            $table->string('symptoms');
            $table->boolean('respiratory_issues');
            $table->boolean('covid_contact');
            $table->timestamps();

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
        Schema::dropIfExists('reason_consultation');
    }
}
