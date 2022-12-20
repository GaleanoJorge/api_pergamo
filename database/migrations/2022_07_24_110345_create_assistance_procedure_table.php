<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistanceProcedureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistance_procedure', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('assistance_id');
            $table->unsignedBigInteger('procedure_id');
            $table->timestamps();


            $table->index('assistance_id');
            $table->index('procedure_id');


            $table->foreign('assistance_id')->references('id')
                ->on('assistance');
            $table->foreign('procedure_id')->references('id')
                ->on('procedure');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assistance_procedure');
    }
}
