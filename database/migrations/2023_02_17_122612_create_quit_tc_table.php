<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuitTcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quit_tc', function (Blueprint $table) {
            $table->string('phone');
            $table->string('status_call');
            $table->string('agent');
            $table->string('date_time');
            $table->string('duration_seg');
            $table->string('uniqueid');
            $table->string('cedula_RUC');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('observations');
            $table->string('fila');
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
        Schema::dropIfExists('quit_tc');
    }
}
