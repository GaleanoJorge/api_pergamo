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
            $table->unsignedBigInteger('assigned_management_plan_id')->nullable();
            $table->unsignedBigInteger('admissions_id');
            $table->string('auth_number')->nullable();
            $table->unsignedBigInteger('authorized_amount')->nullable();
            $table->string('observation')->nullable();
            $table->boolean('copay')->nullable();
            $table->integer('copay_value')->nullable();
            $table->unsignedBigInteger('auth_status_id');
            $table->unsignedBigInteger('auth_package_id')->nullable();
            $table->unsignedBigInteger('manual_price_id')->nullable();
            $table->unsignedBigInteger('application_id')->nullable();
            $table->unsignedBigInteger('procedure_id')->nullable();
            $table->unsignedBigInteger('supplies_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
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

            $table->index('auth_package_id');
            $table->foreign('auth_package_id')->references('id')
                ->on('authorization');

            $table->index('manual_price_id');
            $table->foreign('manual_price_id')->references('id')
                ->on('manual_price');

            $table->index('supplies_id');
            $table->foreign('supplies_id')->references('id')
                ->on('product_supplies');

            $table->index('product_id');
            $table->foreign('product_id')->references('id')
                ->on('product_generic');

            $table->index('procedure_id');
            $table->foreign('procedure_id')->references('id')
                ->on('procedure');

            $table->index('application_id');
            $table->foreign('application_id')->references('id')
                ->on('assistance_supplies');

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
