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
            $table->string('name');
            $table->integer('factor');
            $table->double('value');
            $table->unsignedBigInteger('contract_id');
            $table->unsignedTinyInteger('campus_id');
            $table->unsignedBigInteger('manual_price_id');
            $table->unsignedBigInteger('type_briefcase_id');
            $table->timestamps();

            $table->index('contract_id');
            $table->foreign('contract_id')->references('id')
                    ->on('contract');
            $table->index('campus_id');
            $table->foreign('campus_id')->references('id')
                    ->on('campus');
            $table->index('manual_price_id');
            $table->foreign('manual_price_id')->references('id')
                    ->on('manual_price');
            $table->index('type_briefcase_id');
            $table->foreign('type_briefcase_id')->references('id')
                    ->on('type_briefcase');
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
