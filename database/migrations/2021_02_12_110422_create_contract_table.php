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
            $table->unsignedtinyInteger('campus_id');
            $table->unsignedBigInteger('type_contract_id');
            $table->integer('occasional');
            $table->double('amount');
            $table->date('start_date');
            $table->date('finish_date');
            $table->unsignedTinyInteger('status_id');
            $table->unsignedBigInteger('firms_id');
            $table->unsignedBigInteger('civil_policy_insurance_id');
            $table->double('value_civil_policy');
            $table->date('start_date_civil_policy');
            $table->date('finish_date_civil_policy');
            $table->unsignedBigInteger('contractual_policy_insurance_id');
            $table->double('value_contractual_policy');
            $table->date('start_date_contractual_policy');
            $table->date('finish_date_contractual_policy');
            $table->datetime('date_of_delivery_of_invoices');
            $table->integer('expiration_days_portafolio');
            $table->integer('discount');
            $table->string('observations');
            $table->string('objective');
            $table->timestamps();
            $table->index('campus_id');
            $table->foreign('campus_id')->references('id')->on('campus');
            $table->index('type_contract_id');
            $table->foreign('type_contract_id')->references('id')->on('type_contract');
            $table->index('status_id');
            $table->foreign('status_id')->references('id')->on('status');
            $table->index('firms_id');
            $table->foreign('firms_id')->references('id')->on('firms');
            $table->index('civil_policy_insurance_id');
            $table->foreign('civil_policy_insurance_id')->references('id')->on('insurance_carrier');
            $table->index('contractual_policy_insurance_id');
            $table->foreign('contractual_policy_insurance_id')->references('id')->on('insurance_carrier');
            
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
