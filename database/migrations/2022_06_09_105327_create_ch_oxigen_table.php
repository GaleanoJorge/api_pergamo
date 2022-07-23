<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChOxigenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_oxigen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('oxygen_type_id');
            $table->unsignedBigInteger('liters_per_minute_id');
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

            $table->index('liters_per_minute_id');
            $table->foreign('liters_per_minute_id')->references('id')
                ->on('oxygen_type');

            $table->index('oxygen_type_id');
            $table->foreign('oxygen_type_id')->references('id')
                ->on('oxygen_type');

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
        Schema::dropIfExists('ch_oxigen');
    }
}
