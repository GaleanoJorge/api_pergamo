<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwallowingDisordersTlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swallowing_disorders_tl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('solid_dysphagia')->nullable();
            $table->string('clear_liquid_dysphagia')->nullable();
            $table->string('thick_liquid_dysphagia')->nullable();
            $table->string('nasogastric_tube')->nullable();
            $table->string('gastrostomy')->nullable();
            $table->string('nothing_orally')->nullable();
            $table->string('observations')->nullable();
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

            $table->index('type_record_id');
            $table->foreign('type_record_id')->references('id')
                    ->on('type_record');
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
        Schema::dropIfExists('swallowing_disorders_tl');
    }
}
