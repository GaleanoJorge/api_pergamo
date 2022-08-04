<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedManagementPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_management_plan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('start_date');
            $table->time('start_hour');
            $table->date('finish_date');
            $table->time('finish_hour');
            $table->bigInteger('redo')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->date('execution_date');
            $table->unsignedBigInteger('management_plan_id');
            $table->timestamps();


            $table->index('management_plan_id');
            $table->index('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users');
            $table->foreign('management_plan_id')->references('id')
                ->on('management_plan');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigned_management_plan');
    }
}
