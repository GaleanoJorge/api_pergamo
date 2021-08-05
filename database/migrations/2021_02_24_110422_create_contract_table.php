<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract', function (Blueprint $table) {
            $table->id();
            $table->string('code',100);
            $table->string('modification_description',1000)->nullable();
            $table->float('modification_value',16,2)->nullable();
            $table->date('date_ini');
            $table->date('date_fin');
            $table->unsignedBigInteger('user_id')->comment('User_id del Contratista');
            $table->double('allocation_resource');
            $table->double('contract_value');
            $table->text('object');
            $table->text('observations')->nullable();
            $table->unsignedTinyInteger('contract_state_id')->nullable();
            $table->timestamps();

            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->index('contract_state_id');
            $table->foreign('contract_state_id')->references('id')->on('contract_state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract');
    }
}
