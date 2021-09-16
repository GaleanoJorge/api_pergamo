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
            $table->string('code');
            $table->string('name');
            $table->unsignedBigInteger('division_id');
            $table->timestamps();

            $table->index('division_id');
            $table->foreign('division_id')->references('id')
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
