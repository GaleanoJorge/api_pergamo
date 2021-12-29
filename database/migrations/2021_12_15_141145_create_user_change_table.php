<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserChangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_change', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wrong_user_id');
            $table->unsignedBigInteger('right_user_id');
            $table->unsignedBigInteger('observation_novelty_id');
            $table->timestamps();
        
            $table->index('observation_novelty_id');
            $table->foreign('observation_novelty_id')->references('id')
                ->on('observation_novelty');
            $table->index('wrong_user_id');
            $table->foreign('wrong_user_id')->references('id')
                ->on('users');
            $table->index('right_user_id');
            $table->foreign('right_user_id')->references('id')
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
        Schema::dropIfExists('user_change');
    }
}
