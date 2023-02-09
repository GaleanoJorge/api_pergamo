<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportRipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_rips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('initial_report');
            $table->date('final_report');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->index('company_id');
            $table->foreign('company_id')->references('id')
                ->on('company');

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
        Schema::dropIfExists('report_rips');
    }
}
