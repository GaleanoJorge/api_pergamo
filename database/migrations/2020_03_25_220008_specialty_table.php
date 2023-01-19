<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SpecialtyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialty', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedTinyInteger('status_id');
            $table->unsignedBigInteger('type_professional_id');
            $table->integer('sga_origin_fk')->nullable();
            $table->timestamps();
            
            $table->index('type_professional_id');
            $table->index('status_id');
            
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('type_professional_id')->references('id')
            ->on('type_professional');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialty');
    }
}
