<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChMedicalOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_medical_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('ambulatory_medical_order')->nullable();
            $table->unsignedBigInteger('procedure_id')->nullable();
            $table->unsignedBigInteger('services_briefcase_id')->nullable();
            $table->integer('amount')->nullable();
            $table->unsignedTinyInteger('frequency_id')->nullable();
            $table->string('observations')->nullable();
            $table->unsignedBigInteger('type_record_id')->nullable();
            $table->unsignedBigInteger('ch_record_id')->nullable();

            $table->timestamps();

            $table->index('procedure_id');
            $table->foreign('procedure_id')->references('id')
                ->on('procedure');

            $table->index('services_briefcase_id');
            $table->foreign('services_briefcase_id')->references('id')
                ->on('services_briefcase');

            $table->index('frequency_id');
            $table->foreign('frequency_id')->references('id')
                ->on('frequency');

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
        Schema::dropIfExists('ch_medical_orders');
    }
}
