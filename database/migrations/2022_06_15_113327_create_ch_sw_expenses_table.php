<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChSwExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_sw_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->double('feeding')->nullable();
            $table->double('gas')->nullable();
            $table->double('light')->nullable();
            $table->double('aqueduct')->nullable();
            $table->double('rent')->nullable();
            $table->double('transportation')->nullable();
            $table->double('recreation')->nullable();
            $table->double('education')->nullable();
            $table->double('medical')->nullable();
            $table->double('cell_phone')->nullable();
            $table->double('landline')->nullable();
            $table->double('total');
            
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');

            $table->timestamps();

           
            $table->index('type_record_id');
            $table->foreign('type_record_id')->references('id')
                ->on('type_record');

            $table->index('ch_record_id');
            $table->foreign('ch_record_id')->references('id')
                ->on('ch_record');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ch_sw_expenses');
    }
}
