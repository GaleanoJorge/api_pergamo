<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersOfHealthServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers_of_health_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->timestamps();

            $table->index('country_id');
            $table->foreign('country_id')->references('id')
            ->on('country');

            $table->index('region_id');
            $table->foreign('region_id')->references('id')
                ->on('region');

            $table->index('municipality_id');
            $table->foreign('municipality_id')->references('id')
                ->on('municipality');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers_of_health_services');
    }
}
