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
            $table->unsignedBigInteger('birthplace_country_id');
            $table->unsignedsmallInteger('birthplace_region_id');
            $table->string('residence_address');
            $table->unsignedsmallInteger('residence_region_id');
            $table->unsignedBigInteger('residence_municipality_id');
            $table->unsignedBigInteger('study_level_status_id');
            $table->unsignedBigInteger('activities_id');
            $table->unsignedBigInteger('neighborhood_or_residence_id');
            $table->unsignedBigInteger('select_rh_id');
            $table->unsignedBigInteger('marital_status_id');
            $table->unsignedBigInteger('inability_id');
            $table->unsignedBigInteger('population_group_id');
            
            $table->rememberToken();
            $table->timestamps();
            $table->index('sga_origin_fk');
            $table->index('status_id');
            $table->index('gender_id');
            $table->index('academic_level_id');
            $table->index('identification_type_id');
            $table->index('birthplace_municipality_id');
            $table->index('select_rh_id');
            $table->index('birthplace_country_id');
            $table->index('birthplace_region_id');
            $table->index('residence_region_id');
            $table->index('residence_municipality_id');
            $table->index('neighborhood_or_residence_id');
            $table->index('activities_id');
            $table->index('study_level_status_id');
            $table->index('marital_status_id');
            $table->index('population_group_id');
            $table->index('inability_id');
          
           
            $table->foreign('inability_id')->references('id')
            ->on('inability');
            $table->foreign('population_group_id')->references('id')
            ->on('population_group');
            $table->foreign('marital_status_id')->references('id')
                ->on('marital_status');
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
            $table->foreign('select_rh_id')->references('id')
                ->on('select_rh');    
            $table->foreign('birthplace_country_id')->references('id')
                ->on('country');  
            $table->foreign('birthplace_region_id')->references('id')
                ->on('region');   
            $table->foreign('residence_region_id')->references('id')
                ->on('region'); 
            $table->foreign('residence_municipality_id')->references('id')
                ->on('municipality');  
            $table->foreign('neighborhood_or_residence_id')->references('id')
                ->on('neighborhood_or_residence');     
            $table->foreign('activities_id')->references('id')
                ->on('activities');
            $table->foreign('study_level_status_id')->references('id')
                ->on('study_level_status');
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
