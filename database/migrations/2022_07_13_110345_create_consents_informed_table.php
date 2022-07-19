<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsentsInformedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consents_informed', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('admissions_id');
            $table->string('firm_patiend')->nullable();
            $table->string('firm_responsible')->nullable();
            $table->unsignedBigInteger('assigned_user_id')->nullable();
            $table->unsignedBigInteger('type_consents_id');
            $table->timestamps();


            $table->index('admissions_id');
            $table->index('assigned_user_id');
            $table->index('type_consents_id');


            $table->foreign('admissions_id')->references('id')
                ->on('admissions');
            $table->foreign('assigned_user_id')->references('id')
                ->on('users');
            $table->foreign('type_consents_id')->references('id')
                ->on('type_consents');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consents_informed');
    }
}
