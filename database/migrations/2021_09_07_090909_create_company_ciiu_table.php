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
            $table->bigInteger('cii_company');
            $table->bigInteger('cii_class');
            $table->bigInteger('cii_clasification');
            $table->timestamps();
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
