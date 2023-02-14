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
            $table->unsignedBigInteger('services_briefcase_id');//
            $table->unsignedBigInteger('assigned_management_plan_id')->nullable();
            $table->unsignedBigInteger('admissions_id');//
            $table->string('auth_number')->nullable();
            $table->unsignedBigInteger('authorized_amount')->nullable();
            $table->string('observation')->nullable();
            $table->integer('quantity')->nullable();
            $table->double('copay_value', 16, 4)->nullable();
            $table->unsignedBigInteger('auth_status_id');
            $table->unsignedBigInteger('auth_package_id')->nullable();
            $table->unsignedBigInteger('fixed_add_id')->nullable();//
            $table->unsignedBigInteger('manual_price_id')->nullable();
            $table->unsignedBigInteger('application_id')->nullable();
            $table->unsignedBigInteger('procedure_id')->nullable();
            $table->unsignedBigInteger('supplies_com_id')->nullable();
            $table->unsignedBigInteger('product_com_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->string('file_auth')->nullable();
            $table->dateTime('open_date')->nullable();
            $table->dateTime('close_date')->nullable();
            $table->timestamps();


            $table->index('fixed_add_id');
            $table->foreign('fixed_add_id')->references('id')
                ->on('fixed_add');
                
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

            $table->index('supplies_com_id');
            $table->foreign('supplies_com_id')->references('id')
                ->on('product_supplies_com');

            $table->index('product_com_id');
            $table->foreign('product_com_id')->references('id')
                ->on('product');

            $table->index('location_id');
            $table->foreign('location_id')->references('id')
                ->on('location');

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
