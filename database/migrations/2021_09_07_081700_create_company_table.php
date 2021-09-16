<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('identype_id');
            $table->string('code');
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('type_id');
            $table->bigInteger('administrator');
            $table->unsignedBigInteger('country_id');
            $table->unsignedsmallInteger('city_id');
            $table->string('address');
            $table->string('phone');
            $table->string('web');
            $table->string('mail');
            $table->string('representative');
            $table->string('repre_phone');
            $table->string('repre_mail');
            $table->string('repre_identification');
            $table->integer('iva');
            $table->integer('retainer');
            $table->unsignedBigInteger('kindperson_id');
            $table->integer('registration');
            $table->integer('opportunity');
            $table->integer('discount');
            $table->integer('term');

            $table->timestamps();
            $table->index('identype_id');
            $table->foreign('identype_id')->references('id')
            ->on('identification_type');
            $table->index('category_id');
            $table->foreign('category_id')->references('id')
            ->on('company_category');
            $table->index('country_id');
            $table->foreign('country_id')->references('id')
            ->on('country');
            $table->index('type_id');
            $table->foreign('type_id')->references('id')
            ->on('company_type');
            $table->index('kindperson_id');
            $table->foreign('kindperson_id')->references('id')
            ->on('company_kindperson');
            $table->index('city_id');
            $table->foreign('city_id')->references('id')
            ->on('region');
            

            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company');
    }
}
