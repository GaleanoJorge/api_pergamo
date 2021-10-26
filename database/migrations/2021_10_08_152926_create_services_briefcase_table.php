<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesBriefcaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_briefcase', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('factor');
            $table->double('value');
            $table->unsignedBigInteger('briefcase_id');
            $table->unsignedBigInteger('manual_price_id');
            $table->timestamps();

            $table->index('briefcase_id');
            $table->foreign('briefcase_id')->references('id')
                    ->on('briefcase');
            $table->index('manual_price_id');
            $table->foreign('manual_price_id')->references('id')
                    ->on('manual_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_briefcase');
    }
}
