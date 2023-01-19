<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementProcedureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management_procedure', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('management_plan_id');
            $table->unsignedBigInteger('procedure_id');
            $table->timestamps();


            $table->index('management_plan_id');
            $table->index('procedure_id');


            $table->foreign('management_plan_id')->references('id')
                ->on('management_plan');
            $table->foreign('procedure_id')->references('id')
                ->on('services_briefcase');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('management_procedure');
    }
}
