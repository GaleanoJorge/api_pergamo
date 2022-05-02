<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorization', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('services_briefcase_id');
            $table->unsignedBigInteger('assigned_management_plan_id');
            $table->unsignedBigInteger('admissions_id');
            $table->string('auth_number')->nullable();
            $table->unsignedBigInteger('authorized_amount')->nullable();
            $table->unsignedBigInteger('observation')->nullable();
            $table->unsignedBigInteger('auth_status_id');
            $table->string('file_auth')->nullable();
            $table->timestamps();

            $table->index('services_briefcase_id');
            $table->foreign('services_briefcase_id')->references('id')
                ->on('services_briefcase');

            $table->index('admissions_id');
            $table->foreign('admissions_id')->references('id')
                ->on('admissions');

            $table->index('auth_status_id');
            $table->foreign('auth_status_id')->references('id')
                ->on('auth_status');

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
        Schema::dropIfExists('authorization');
    }
}
