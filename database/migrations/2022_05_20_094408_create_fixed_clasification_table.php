<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedClasificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_clasification', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('fixed_code_id');
            $table->timestamps();

            $table->index('fixed_code_id');
            $table->foreign('fixed_code_id')->references('id')
                ->on('fixed_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixed_clasification');
    }
}
