<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceLevelTcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_level_tc', function (Blueprint $table) {
            $table->string('line');
            $table->string('i0_10');
            $table->string('i11_20');
            $table->string('i21_30');
            $table->string('i31_40');
            $table->string('i41_50');
            $table->string('i51_60');
            $table->string('older_than_60');
            $table->string('total_calls_received');
            $table->string('replied_20');
            $table->string('service_level');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_level_tc');
    }
}
