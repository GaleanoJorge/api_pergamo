<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolicyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('policy_value');
            $table->unsignedBigInteger('contract_id');
            $table->unsignedBigInteger('policy_type_id');
            $table->unsignedBigInteger('insurance_carrier_id');
            $table->date('start_date');
            $table->date('finish_date');
            $table->string('policy_file');
            $table->timestamps();
        
            $table->index('policy_type_id');
            $table->index('insurance_carrier_id');
            $table->index('contract_id');

            $table->foreign('policy_type_id')->references('id')
                ->on('policy_type');
            $table->foreign('insurance_carrier_id')->references('id')
                ->on('insurance_carrier');
            $table->foreign('contract_id')->references('id')
                ->on('contract');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('policy');
    }
}
