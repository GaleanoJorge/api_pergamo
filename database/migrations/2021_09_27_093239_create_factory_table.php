<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('identification_type_id');
            $table->string ('identification');
            $table->integer('verification');
            $table->string ('name');
            $table->unsignedTinyInteger('status_id');
            $table->timestamps();


            $table->index('identification_type_id');
            $table->foreign('identification_type_id')->references('id')
                    ->on('identification_type');
            $table->index('status_id');
            $table->foreign('status_id')->references('id')
                    ->on('status');
        });
        
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factory');
    }
}
