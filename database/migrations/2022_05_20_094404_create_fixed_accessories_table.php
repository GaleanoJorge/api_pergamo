<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_accessories', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('name');
            $table->integer('amount');
            $table->unsignedBigInteger('fixed_type_id');
            $table->timestamps();
            $table->index('fixed_type_id');
            $table->foreign('fixed_type_id')->references('id')
                    ->on('fixed_type');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixed_accessories');
    }
}
