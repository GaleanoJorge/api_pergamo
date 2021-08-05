<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedSmallInteger('role_id');
            $table->integer('sga_origin_fk')->nullable();
            $table->timestamps();

            $table->index('user_id');
            $table->index('role_id');
            $table->foreign('user_id')->references('id')
                ->on('users');
            $table->foreign('role_id')->references('id')
                ->on('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_role');
    }
}
