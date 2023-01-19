<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBriefcaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('briefcase', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('contract_id');
            $table->unsignedBigInteger('coverage_id');
            $table->unsignedBigInteger('modality_id');
            $table->unsignedTinyInteger('status_id');
            $table->integer('type_auth');
            $table->timestamps();

            $table->index('contract_id');
            $table->foreign('contract_id')->references('id')
                    ->on('contract');
            $table->index('coverage_id');
            $table->foreign('coverage_id')->references('id')
                    ->on('coverage');
            $table->index('modality_id');
            $table->foreign('modality_id')->references('id')
                    ->on('modality');
            $table->index('status_id');
            $table->foreign('status_id')->references('id')
                    ->on('status');
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
