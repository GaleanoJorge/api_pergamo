<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleAttentionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_attention', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('role_id');
            $table->unsignedTinyInteger('type_of_attention_id');
            $table->timestamps();

            $table->index('role_id');
            $table->index('type_of_attention_id');

            $table->foreign('role_id')->references('id')
                ->on('role');
            $table->foreign('type_of_attention_id')->references('id')
                ->on('type_of_attention');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_attention');
    }
}
