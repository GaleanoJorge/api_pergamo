<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->integer('sga_origin_fk')->nullable();
            $table->unsignedTinyInteger('status_id');
            $table->unsignedTinyInteger('role_type_id')->nullable();
            $table->timestamps();

            $table->index('status_id');
            $table->foreign('status_id')->references('id')
                ->on('status');

            $table->index('role_type_id');
            $table->foreign('role_type_id')->references('id')
                ->on('role_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role');
    }
}
