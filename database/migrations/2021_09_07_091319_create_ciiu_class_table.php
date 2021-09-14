<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiiuClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciiu_class', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cic_code');
            $table->string('cic_name');
            $table->unsignedBigInteger('cic_group');
            $table->timestamps();
            $table->index('cic_group');
            $table->foreign('cic_group')->references('id')
            ->on('ciiu_group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciiu_class');
    }
}
