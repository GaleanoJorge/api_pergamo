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
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('bank_id');
                $table->unsignedBigInteger('account_type_id');  
                $table->double('account_number');
                $table->string('rut');
                $table->timestamps();
    
                $table->index('bank_id');

                $table->foreign('bank_id')->references('id')
                    ->on('bank');

                $table->index('account_type_id');

                 $table->foreign('account_type_id')->references('id')
                        ->on('account_type');
                        
                $table->index('user_id');

                 $table->foreign('user_id')->references('id')
                        ->on('users');

                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financial_data');
    }
}
