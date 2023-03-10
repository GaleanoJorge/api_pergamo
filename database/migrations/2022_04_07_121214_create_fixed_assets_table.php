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
            $table->unsignedBigInteger('fixed_type_id');
            $table->unsignedBigInteger('fixed_stock_id');
            $table->unsignedBigInteger('fixed_property_id');
            $table->string('obs_property')->nullable();
            $table->string('plaque')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('model')->nullable();
            $table->string('mark');
            $table->string('serial')->nullable();
            $table->unsignedBigInteger('fixed_nom_product_id');
            $table->string('detail_description')->nullable();
            $table->string('color');
            $table->string('status_prod')->nullable();
            $table->unsignedBigInteger('fixed_condition_id');


            $table->string('accessories')->nullable();
            $table->string('calibration_certificate')->nullable();
            $table->string('health_register')->nullable();
            $table->string('warranty')->nullable();
            $table->string('cv')->nullable();
            $table->date('last_maintenance')->nullable();
            $table->date('last_pame')->nullable();
            $table->string('interventions_carriet')->nullable();
            $table->string('type')->nullable();
            $table->string('mobile_fixed')->nullable();
            $table->unsignedBigInteger('clasification_risk_id')->nullable();
            $table->unsignedBigInteger('biomedical_classification_id')->nullable();
            $table->string('code_ecri')->nullable();
            $table->string('form_acquisition')->nullable();
            $table->date('date_adquisicion')->nullable();
            $table->date('date_warranty')->nullable();
            $table->string('useful_life')->nullable();
            $table->integer('cost')->nullable();
            $table->string('maker')->nullable();
            $table->string('phone_maker')->nullable();
            $table->string('email_maker')->nullable();
            $table->string('power_supply')->nullable();
            $table->string('predominant_technology')->nullable();
            $table->string('volt')->nullable();
            $table->string('stream')->nullable();
            $table->string('power')->nullable();
            $table->string('frequency_rank')->nullable();
            $table->string('temperature_rank')->nullable();
            $table->string('humidity_rank')->nullable();
            $table->string('manuals')->nullable();
            $table->string('guide')->nullable();
            $table->unsignedBigInteger('periodicity_frequency_id')->nullable();
            $table->unsignedBigInteger('calibration_frequency_id')->nullable();
            $table->timestamps();

            $table->index('fixed_clasification_id');
            $table->foreign('fixed_clasification_id')->references('id')
                ->on('fixed_clasification');
            $table->index('fixed_nom_product_id');
            $table->foreign('fixed_nom_product_id')->references('id')
                ->on('fixed_nom_product');

            $table->index('company_id');
            $table->foreign('company_id')->references('id')
                ->on('company');
                
            $table->index('fixed_type_id');
            $table->foreign('fixed_type_id')->references('id')
                ->on('fixed_type');

            $table->index('fixed_stock_id');
            $table->foreign('fixed_stock_id')->references('id')
                ->on('fixed_stock');

            $table->index('fixed_property_id');
            $table->foreign('fixed_property_id')->references('id')
                ->on('fixed_property');

            $table->index('fixed_condition_id');
            $table->foreign('fixed_condition_id')->references('id')
                ->on('fixed_condition');

            $table->index('clasification_risk_id');
            $table->foreign('clasification_risk_id')->references('id')
                ->on('risk');
            $table->index('biomedical_classification_id');
            $table->foreign('biomedical_classification_id')->references('id')
                ->on('biomedical_classification');

            $table->index('periodicity_frequency_id');
            $table->foreign('periodicity_frequency_id')->references('id')
                ->on('periodicity_frequency');

            $table->index('calibration_frequency_id');
            $table->foreign('calibration_frequency_id')->references('id')
                ->on('periodicity_frequency');
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
