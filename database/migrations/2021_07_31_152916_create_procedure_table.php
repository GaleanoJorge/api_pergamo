<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedure', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('equivalent');
            $table->string('name');
            $table->unsignedBigInteger('procedure_type_id');
            $table->unsignedBigInteger('pbs_type_id');
            $table->unsignedBigInteger('procedure_category_id');
            $table->unsignedBigInteger('purpose_service_id');
            $table->integer('nopos');
            $table->unsignedBigInteger('procedure_age_id');
            $table->unsignedTinyInteger('gender_id');
            $table->unsignedTinyInteger('status_id');
            $table->unsignedBigInteger('procedure_purpose_id');
            $table->time('time')->nullable();
            $table->timestamps();
            
            $table->index('procedure_category_id');
            $table->index('procedure_age_id');
            $table->index('gender_id');
            $table->index('procedure_purpose_id');
            $table->index('status_id');
            $table->index('procedure_type_id');
            $table->index('pbs_type_id');
            $table->index('purpose_service_id');

            $table->foreign('procedure_category_id')->references('id')
                ->on('procedure_category');
            $table->foreign('procedure_age_id')->references('id')
                ->on('procedure_age'); 
            $table->foreign('gender_id')->references('id')
                ->on('gender');
            $table->foreign('procedure_purpose_id')->references('id')
                ->on('procedure_purpose');  
            $table->foreign('status_id')->references('id')
                ->on('status');
            $table->foreign('procedure_type_id')->references('id')
                ->on('procedure_type');
            $table->foreign('pbs_type_id')->references('id')
                ->on('pbs_type');
            $table->foreign('purpose_service_id')->references('id')
                ->on('purpose_service');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procedure');
    }
}
