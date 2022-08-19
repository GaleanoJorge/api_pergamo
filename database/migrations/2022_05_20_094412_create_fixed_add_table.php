<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedAddTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_add', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('status')->nullable();
            $table->string('observation')->nullable();
            $table->string('request_amount')->nullable();
            $table->unsignedBigInteger('admissions_id')->nullable();
            $table->unsignedBigInteger('responsible_user_id')->nullable();
            $table->unsignedBigInteger('fixed_assets_id')->nullable();
            $table->unsignedBigInteger('management_plan_id')->nullable();
            $table->unsignedBigInteger('fixed_accessories_id')->nullable();
            $table->unsignedBigInteger('fixed_nom_product_id')->nullable();
            $table->unsignedBigInteger('fixed_location_campus_id')->nullable();
            $table->unsignedBigInteger('own_fixed_user_id')->nullable();
            $table->unsignedBigInteger('request_fixed_user_id')->nullable();
            $table->unsignedBigInteger('procedure_id')->nullable();

            $table->timestamps();

            $table->index('procedure_id');
            $table->foreign('procedure_id')->references('id')
            ->on('services_briefcase');


            $table->index('fixed_assets_id');
            $table->foreign('fixed_assets_id')->references('id')
                ->on('fixed_assets');

            $table->index('fixed_accessories_id');
            $table->foreign('fixed_accessories_id')->references('id')
                ->on('fixed_accessories');

            $table->index('fixed_location_campus_id');
            $table->foreign('fixed_location_campus_id')->references('id')
                ->on('fixed_location_campus');

            $table->index('responsible_user_id');
            $table->foreign('responsible_user_id')->references('id')
                ->on('users');


            $table->index('fixed_nom_product_id');
            $table->foreign('fixed_nom_product_id')->references('id')
                ->on('fixed_nom_product');

            $table->index('admissions_id');
            $table->foreign('admissions_id')->references('id')
                ->on('admissions');

            $table->index('management_plan_id');
            $table->foreign('management_plan_id')->references('id')
                ->on('management_plan');


            $table->index('own_fixed_user_id');
            $table->foreign('own_fixed_user_id')->references('id')
                ->on('users');

            $table->index('request_fixed_user_id');
            $table->foreign('request_fixed_user_id')->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixed_add');
    }
}
