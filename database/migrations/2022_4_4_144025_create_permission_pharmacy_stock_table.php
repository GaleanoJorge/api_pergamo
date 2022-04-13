<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionPharmacyStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_pharmacy_stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('permission_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

           $table->index('permission_id');
            $table->foreign('permission_id')->references('id')
                ->on('permission');

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
        Schema::dropIfExists('permission_pharmacy_stock');
    }
}
