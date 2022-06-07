<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorizationPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorization_package', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('authorization_id');
            $table->unsignedBigInteger('assigned_management_plan_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('authorization_id');
            $table->index('assigned_management_plan_id');
            $table->index('user_id');

            $table->foreign('authorization_id')->references('id')
                ->on('authorization');
            $table->foreign('assigned_management_plan_id')->references('id')
                ->on('assigned_management_plan');
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
        Schema::dropIfExists('authorization_package');
    }
}
