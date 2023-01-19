<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampusBriefcaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus_briefcase', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('campus_id');
            $table->unsignedBigInteger('briefcase_id');
            $table->timestamps();

            $table->index('briefcase_id');
            $table->foreign('briefcase_id')->references('id')
                    ->on('briefcase');
            $table->index('campus_id');
            $table->foreign('campus_id')->references('id')
                    ->on('campus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campus_briefcase');
    }
}
