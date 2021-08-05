<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedSmallInteger('role_id');
            $table->dateTime('date');
            $table->text('query');
            $table->decimal('time');
            $table->timestamps();

            $table->index('user_id');
            $table->index('role_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('role_id')->references('id')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
