<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedTypeRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_type_role', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('fixed_type_id');
            $table->unsignedBigInteger('user_role_id');

            $table->timestamps();

            $table->index('fixed_type_id');
            $table->foreign('fixed_type_id')->references('id')
                ->on('fixed_type');

            $table->index('user_role_id');
            $table->foreign('user_role_id')->references('id')
                ->on('user_role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixed_type_role');
    }
}