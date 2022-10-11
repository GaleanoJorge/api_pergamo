<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogAssignedManagementPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_assigned_management_plan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('assigned_management_plan_id')->nullable();
            $table->string('status');
            
            $table->string('i_start_date')->nullable();
            $table->string('i_finish_date')->nullable();
            $table->unsignedBigInteger('i_user_id')->nullable();
            $table->string('i_start_hour')->nullable();
            $table->string('i_finish_hour')->nullable();

            $table->string('f_start_date')->nullable();
            $table->string('f_finish_date')->nullable();
            $table->unsignedBigInteger('f_user_id')->nullable();
            $table->string('f_start_hour')->nullable();
            $table->string('f_finish_hour')->nullable();
            $table->timestamps();

            $table->index('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users');

            $table->index('i_user_id');
            $table->foreign('i_user_id')->references('id')
                ->on('users');

            $table->index('f_user_id');
            $table->foreign('f_user_id')->references('id')
                ->on('users');

            $table->index('assigned_management_plan_id');
            $table->foreign('assigned_management_plan_id')->references('id')
                ->on('assigned_management_plan');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_assigned_management_plan');
    }
}
