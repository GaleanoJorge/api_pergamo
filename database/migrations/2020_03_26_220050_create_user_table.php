<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('status_id');
            $table->unsignedTinyInteger('gender_id')->nullable();
            $table->string('gender_type')->nullable();;
            $table->boolean('is_disability');
            $table->string('disability')->nullable();
            $table->unsignedTinyInteger('ethnicity_id')->nullable();
            $table->unsignedTinyInteger('academic_level_id')->nullable();
            $table->unsignedTinyInteger('identification_type_id')->nullable();
            $table->unsignedBigInteger('birthplace_municipality_id')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('firstname');
            $table->string('middlefirstname')->nullable();
            $table->string('lastname');
            $table->string('middlelastname')->nullable();
            $table->string('identification',100)->nullable();
            $table->date('birthday')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->bigInteger('landline')->nullable();
            $table->bigInteger('sync_id')->nullable();
            $table->boolean('force_reset_password')->unsigned()->default('0');
            $table->integer('sga_origin_fk')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->index('sga_origin_fk');
            $table->index('status_id');
            $table->index('gender_id');
            $table->index('academic_level_id');
            $table->index('identification_type_id');
            $table->index('birthplace_municipality_id');
            $table->foreign('status_id')->references('id')
                ->on('status');
            $table->foreign('gender_id')->references('id')
                ->on('gender');
            $table->foreign('academic_level_id')->references('id')
                ->on('academic_level');
            $table->foreign('identification_type_id')->references('id')
                ->on('identification_type');
            $table->foreign('birthplace_municipality_id')->references('id')
                ->on('municipality');
            $table->foreign('ethnicity_id')->references('id')
                ->on('ethnicity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
