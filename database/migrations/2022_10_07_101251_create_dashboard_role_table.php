<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashboardRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboard_role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dashboard_id');
            $table->unsignedSmallInteger('role_id');
            $table->timestamps();

            $table->index('role_id');
            $table->foreign('role_id')->references('id')
                ->on('role');

            $table->index('dashboard_id');
            $table->foreign('dashboard_id')->references('id')
                ->on('dashboard');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dashboard_role');
    }
}
