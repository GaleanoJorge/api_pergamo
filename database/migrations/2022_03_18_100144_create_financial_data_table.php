<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_data', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('bank_information_id');
                $table->string('rut');
                $table->timestamps();
    
                $table->index('bank_information_id');

                $table->foreign('bank_information_id')->references('id')
                    ->on('bank_information');
               

                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_activity');
    }
}
