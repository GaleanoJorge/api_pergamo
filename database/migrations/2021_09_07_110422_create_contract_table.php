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
            $table->string('number_contract')->nullable();
            $table->string('name')->nullable();
            $table->unsignedbigInteger('company_id')->nullable();
            $table->unsignedBigInteger('type_contract_id')->nullable();
            $table->integer('occasional')->nullable();
            $table->double('amount')->nullable();
            $table->date('start_date')->nullable();
            $table->date('finish_date')->nullable();
            $table->unsignedBigInteger('contract_status_id')->nullable();
            $table->unsignedBigInteger('firms_contractor_id')->nullable();
            $table->unsignedBigInteger('firms_contracting_id')->nullable();
            $table->integer('start_date_invoice')->nullable();
            $table->unsignedBigInteger('regime_id')->nullable();
            $table->integer('finish_date_invoice')->nullable();
            $table->integer('expiration_days_portafolio')->nullable();
            $table->integer('discount')->nullable();
            $table->string('observations')->nullable();
            $table->string('objective')->nullable();
            $table->bigInteger('min_attention')->nullable();
            $table->bigInteger('max_attention')->nullable();
            $table->double('discount_rate', 16, 4)->nullable();
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
