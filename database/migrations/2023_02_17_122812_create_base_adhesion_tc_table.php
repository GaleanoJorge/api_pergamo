<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseAdhesionTcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_adhesion_tc', function (Blueprint $table) {
            $table->string('agent');
            $table->string('name');
            $table->string('date_init');
            $table->string('date_end');
            $table->string('total_login');
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
        Schema::dropIfExists('base_adhesion_tc');
    }
}
