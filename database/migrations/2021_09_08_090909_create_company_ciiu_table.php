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
            $table->unsignedBigInteger('cii_company');
            $table->unsignedBigInteger('cii_class');
            $table->unsignedBigInteger('cii_clasification');
            $table->timestamps();
            $table->index('cii_company');
            $table->foreign('cii_company')->references('id')
            ->on('company');
            $table->index('cii_class');
            $table->foreign('cii_class')->references('id')
            ->on('ciiu_class');
            $table->index('cii_clasification');
            $table->foreign('cii_clasification')->references('id')
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
