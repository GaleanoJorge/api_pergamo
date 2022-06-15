<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_assets', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('fixed_clasification_id');
            $table->unsignedBigInteger('fixed_type_role_id');
            $table->unsignedBigInteger('fixed_property_id');
            $table->string('obs_property')->nullable();
            $table->string('plaque')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->integer('amount');
            $table->string('model')->nullable();
            $table->string('mark');
            $table->string('serial')->nullable();
            $table->string('description');
            $table->string('detail_description');
            $table->string('color');
            $table->string('status');
            $table->unsignedBigInteger('fixed_condition_id');
            $table->unsignedBigInteger('campus_id');
            $table->timestamps();

            $table->index('fixed_clasification_id');
            $table->foreign('fixed_clasification_id')->references('id')
                ->on('fixed_clasification');

            $table->index('company_id');
            $table->foreign('company_id')->references('id')
                ->on('company');

            $table->index('fixed_type_role_id');
            $table->foreign('fixed_type_role_id')->references('id')
                ->on('fixed_type_role');

            $table->index('fixed_property_id');
            $table->foreign('fixed_property_id')->references('id')
                ->on('fixed_property');

            $table->index('fixed_condition_id');
            $table->foreign('fixed_condition_id')->references('id')
                ->on('fixed_condition');

            $table->index('campus_id');
            $table->foreign('campus_id')->references('id')
                ->on('campus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixed_assets');
    }
}
