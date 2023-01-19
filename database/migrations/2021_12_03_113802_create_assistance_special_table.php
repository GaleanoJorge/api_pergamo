<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistanceSpecialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistance_special', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('specialty_id');
            $table->unsignedBigInteger('assistance_id');
            
            $table->timestamps();

            $table->index('specialty_id');
            $table->foreign('specialty_id')->references('id')
                ->on('specialty');
            $table->index('assistance_id');
            $table->foreign('assistance_id')->references('id')
                ->on('assistance');
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assistance_special');
    }
}
