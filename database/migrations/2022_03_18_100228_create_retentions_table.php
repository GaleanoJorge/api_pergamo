<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retentions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('account_receivable_id');
            $table->string('rrt_salary');
            $table->string('rrt_comprehensive_salary');
            $table->string('rrt_means_transport');
            $table->string('rrt_holidays');
            $table->string('incr_mandatory_pension_contributions');
            $table->string('incr_mandatory_fund_contributions');
            $table->string('incr_mandatory_health_contributions');
            $table->string('incr_voluntary_contributions_funds');
            $table->string('incr_non_rental_income');
            $table->string('d_home_interest_payment');
            $table->string('d_dependent_payment');
            $table->string('d_health_payments_prepaid_medicine');
            $table->string('re_contributions_voluntay_pension_fund');
            $table->string('re_contributions_accounts');
            $table->string('re_other_extensive_icome');
           
            $table->timestamps();

            $table->index('account_receivable_id');

            $table
                ->foreign('account_receivable_id')
                ->references('id')
                ->on('account_receivable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retentions');
    }
}
