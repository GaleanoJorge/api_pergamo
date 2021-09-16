<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyCiiuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_ciiu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('clasification_id');
            $table->timestamps();
            $table->index('company_id');
            $table->foreign('company_id')->references('id')
            ->on('company');
            $table->index('class_id');
            $table->foreign('class_id')->references('id')
            ->on('ciiu_class');
            $table->index('clasification_id');
            $table->foreign('clasification_id')->references('id')
            ->on('fiscal_clasification');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_ciiu');
    }
}
