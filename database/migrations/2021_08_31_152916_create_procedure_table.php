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
            $table->unsignedBigInteger('category_id');
            $table->integer('nopos');
            $table->unsignedBigInteger('age_id');
            $table->unsignedTinyInteger('gender_id');
            $table->unsignedTinyInteger('status_id');
            $table->unsignedBigInteger('purpose_id');
            $table->time('time');
            $table->timestamps();
            
            $table->index('category_id');
            $table->index('age_id');
            $table->index('gender_id');
            $table->index('purpose_id');
            $table->index('status_id');

            $table->foreign('category_id')->references('id')
                ->on('procedure_category');
            $table->foreign('age_id')->references('id')
                ->on('procedure_age'); 
            $table->foreign('gender_id')->references('id')
                ->on('gender');
            $table->foreign('purpose_id')->references('id')
                ->on('procedure_purpose');  
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
        Schema::dropIfExists('procedure');
    }
}
