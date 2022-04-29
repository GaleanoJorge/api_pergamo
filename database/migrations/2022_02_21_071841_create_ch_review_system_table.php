<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChReviewSystemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_review_system', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_review_system_id');
            $table->string('revision');
            $table->string('observation');
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();
           
              $table->index('type_record_id');
                $table->foreign('type_record_id')->references('id')
                    ->on('type_record');

                    $table->index('type_review_system_id');
                    $table->foreign('type_review_system_id')->references('id')
                        ->on('type_review_system');

                    $table->index('ch_record_id');
                    $table->foreign('ch_record_id')->references('id')
                        ->on('ch_record');

   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ch_review_system');
    }
}
