<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedurePackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedure_package', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('procedure_package_id');
            $table->unsignedBigInteger('procedure_id');
            $table->timestamps();

            $table->index('procedure_package_id');
            $table->foreign('procedure_package_id')->references('id')
                    ->on('procedure');
            $table->index('procedure_id');
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
        Schema::dropIfExists('procedure_package');
    }
}
