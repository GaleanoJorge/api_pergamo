<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number_contract');
            $table->string('name');
            $table->unsignedbigInteger('company_id');
            $table->unsignedBigInteger('type_contract_id');
            $table->integer('occasional');
            $table->double('amount');
            $table->date('start_date');
            $table->date('finish_date');
            $table->unsignedBigInteger('contract_status_id');
            $table->unsignedBigInteger('firms_contractor_id');
            $table->unsignedBigInteger('firms_contracting_id');
            $table->unsignedBigInteger('civil_policy_insurance_id');
            $table->double('value_civil_policy');
            $table->date('start_date_civil_policy');
            $table->date('finish_date_civil_policy');
            $table->unsignedBigInteger('contractual_policy_insurance_id');
            $table->double('value_contractual_policy');
            $table->date('start_date_contractual_policy');
            $table->date('finish_date_contractual_policy');
            $table->integer('start_date_invoice');
            $table->unsignedBigInteger('regime_id');
            $table->integer('finish_date_invoice');
            $table->integer('time_delivery_invoice');
            $table->integer('expiration_days_portafolio');
            $table->integer('discount');
            $table->string('observations');
            $table->string('objective');
            $table->timestamps();
            $table->index('company_id');
            $table->foreign('company_id')->references('id')->on('company');
            $table->index('type_contract_id');
            $table->foreign('type_contract_id')->references('id')->on('type_contract');
            $table->index('contract_status_id');
            $table->foreign('contract_status_id')->references('id')->on('contract_status');
            $table->index('firms_contractor_id');
            $table->foreign('firms_contractor_id')->references('id')->on('firms');
            $table->index('firms_contracting_id');
            $table->foreign('firms_contracting_id')->references('id')->on('firms');
            $table->index('civil_policy_insurance_id');
            $table->foreign('civil_policy_insurance_id')->references('id')->on('insurance_carrier');
            $table->index('contractual_policy_insurance_id');
            $table->foreign('contractual_policy_insurance_id')->references('id')->on('insurance_carrier');
            $table->index('regime_id');
            $table->foreign('regime_id')->references('id')->on('type_briefcase');
            
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract');
    }
}
