<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_activity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('procedure_id');
            $table->unsignedBigInteger('gloss_ambit_id');
            $table->timestamps();


            $table->index('user_id');
            $table->index('procedure_id');
            $table->index('gloss_ambit_id');
            

            $table->foreign('user_id')->references('id')
                ->on('users');
                
            $table->foreign('procedure_id')->references('id')
                ->on('procedure');
            $table->foreign('gloss_ambit_id')->references('id')
                ->on('gloss_ambit');
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
