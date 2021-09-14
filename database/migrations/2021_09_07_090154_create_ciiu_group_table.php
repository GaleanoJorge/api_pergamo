<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiiuGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciiu_group', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cig_code');
            $table->string('cig_name');
            $table->unsignedBigInteger('cig_division');
            $table->timestamps();

            $table->index('cig_division');
            $table->foreign('cig_division')->references('id')
            ->on('ciiu_division');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciiu_group');
    }
}
