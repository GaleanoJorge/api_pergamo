<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bank_id');
            $table->unsignedBigInteger('account_type_id');  
            $table->double('account_number');
            $table->timestamps();

            $table->index('bank_id');

                $table->foreign('bank_id')->references('id')
                    ->on('bank');

                $table->index('account_type_id');

                 $table->foreign('account_type_id')->references('id')
                        ->on('account_type');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_information');
    }
}
