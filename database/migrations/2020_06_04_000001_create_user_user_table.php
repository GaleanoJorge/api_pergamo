<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_user', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_parent_id');
            $table->timestamps();

            $table->index('user_id');
            $table->index('user_parent_id');
            $table->foreign('user_id')->references('id')
                ->on('users');
            $table->foreign('user_parent_id')->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_user');
    }
}
