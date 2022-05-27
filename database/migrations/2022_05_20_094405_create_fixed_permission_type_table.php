<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedPermissionTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_permission_type', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedSmallInteger('permission_id');
            $table->unsignedBigInteger('fixed_type_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('permission_id');
            $table->foreign('permission_id')->references('id')
                ->on('permission');

            $table->index('fixed_type_id');
            $table->foreign('fixed_type_id')->references('id')
                ->on('fixed_type');

            $table->index('user_id');
            $table->foreign('user_id')->references('id')
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
        Schema::dropIfExists('fixed_permission_type');
    }
}
