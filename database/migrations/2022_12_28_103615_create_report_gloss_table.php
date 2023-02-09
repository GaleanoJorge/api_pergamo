<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportGlossTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_gloss', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('initial_report');
            $table->date('final_report');
            $table->unsignedBigInteger('gloss_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->index('gloss_id');
            $table->foreign('gloss_id')->references('id')
                ->on('gloss');

            $table->index('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_gloss');
    }
}
