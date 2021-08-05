<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemRolePermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_role_permission', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('item_id');
            $table->unsignedSmallInteger('role_id');
            $table->unsignedSmallInteger('permission_id');
            $table->timestamps();

            $table->index('item_id');
            $table->index('role_id');
            $table->index('permission_id');
            $table->foreign('item_id')->references('id')
                ->on('item');
            $table->foreign('role_id')->references('id')
                ->on('role');
            $table->foreign('permission_id')->references('id')
                ->on('permission');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_role_permission');
    }
}
