<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesBriefcaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_briefcase', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('contract_id');
            $table->unsignedBigInteger('procedure_id');
            $table->unsignedBigInteger('modality_id');
            $table->timestamps();

            $table->index('contract_id');
            $table->foreign('contract_id')->references('id')
                    ->on('contract');
            $table->index('procedure_id');
            $table->foreign('procedure_id')->references('id')
                    ->on('procedure');
            $table->index('modality_id');
            $table->foreign('modality_id')->references('id')
                    ->on('modality');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_briefcase');
    }
}
