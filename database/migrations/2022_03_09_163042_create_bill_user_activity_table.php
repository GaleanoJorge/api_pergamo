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
            $table->unsignedBigInteger('procedure_id');
            $table->unsignedBigInteger('admissions_id');
            $table->unsignedBigInteger('account_receivable_id');
            $table->double('value');
            $table->string('status');
            $table->string('observation');
            $table->timestamps();

            $table->index('account_receivable_id');
            

            $table->foreign('account_receivable_id')->references('id')
                ->on('account_receivable');
                $table->index('procedure_id');
                $table->foreign('procedure_id')->references('id')
                ->on('services_briefcase');

                $table->index('admission_id');
                $table->foreign('admission_id')->references('id')
                ->on('admissiona');
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
