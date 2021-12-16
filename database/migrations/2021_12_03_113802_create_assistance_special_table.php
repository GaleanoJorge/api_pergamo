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
            $table->unsignedBigInteger('special_field_id');
            $table->unsignedBigInteger('assistance_id');
            
            $table->timestamps();

            $table->index('special_field_id');
            $table->foreign('special_field_id')->references('id')
                ->on('special_field');
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
