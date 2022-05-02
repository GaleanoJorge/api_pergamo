<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('provider_name');
            $table->string('num_evidence');
            $table->string('sub_total');
            $table->string('vat');
            $table->string('setting_value');
            $table->string('invoice_value');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('type_billing_evidence_id');
            $table->timestamps();

            $table->index('company_id');
            $table->foreign('company_id')->references('id')
            ->on('company');

            $table->index('type_billing_evidence_id');
            $table->foreign('type_billing_evidence_id')->references('id')
                ->on('type_billing_evidence');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing');
    }
}
