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
            $table->bigIncrements('prd_id');
            $table->string('prd_code');
            $table->string('prd_equivalent');
            $table->string('prd_name');
            $table->unsignedBigInteger('prd_category');
            $table->integer('prd_nopos');
            $table->unsignedBigInteger('prd_age');
            $table->unsignedTinyInteger('prd_gender');
            $table->integer('prd_state');
            $table->unsignedBigInteger('prd_purpose');
            $table->timestamps();

            $table->index('prd_category');
            $table->index('prd_age');
            $table->index('prd_gender');
            $table->index('prd_purpose');

            $table->foreign('prd_category')->references('prc_id')
                ->on('procedure_category');
            $table->foreign('prd_age')->references('pra_id')
                ->on('procedure_age'); 
                $table->foreign('prd_gender')->references('id')
                ->on('gender');
                $table->foreign('prd_purpose')->references('prp_id')
                ->on('procedure_purpose');  
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
