<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRipsTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rips_type', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('rips_typefile_id');
            $table->timestamps();

            $table->index('rips_typefile_id');
            $table->foreign('rips_typefile_id')->references('id')
            ->on('rips_typefile');




           
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rips_type');
    }
}
