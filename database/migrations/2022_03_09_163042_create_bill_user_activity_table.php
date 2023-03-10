<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillUserActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_user_activity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('procedure_id')->nullable();
            $table->unsignedBigInteger('admissions_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->unsignedBigInteger('account_receivable_id');
            $table->unsignedBigInteger('tariff_id')->nullable();
            $table->unsignedBigInteger('assigned_management_plan_id');
            $table->string('status');
            $table->string('observation');
            $table->timestamps();

            $table->index('account_receivable_id');
            $table->foreign('account_receivable_id')->references('id')
                ->on('account_receivable');

            $table->index('assigned_management_plan_id');
            $table->foreign('assigned_management_plan_id')->references('id')
                ->on('assigned_management_plan');

            $table->index('tariff_id');
            $table->foreign('tariff_id')->references('id')
                ->on('tariff');

            $table->index('procedure_id');
            $table->foreign('procedure_id')->references('id')
                ->on('services_briefcase');

            $table->index('admissions_id');
            $table->foreign('admissions_id')->references('id')
                ->on('admissions');

                
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
        Schema::dropIfExists('bill_user_activity');
    }
}
