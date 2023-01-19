<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChSwFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_sw_family', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('middlefirstname')->nullable();
            $table->string('lastname');
            $table->string('middlelastname')->nullable();
            $table->string('range_age');
            $table->integer('identification');
            $table->bigInteger('phone');
            $table->bigInteger('landline')->nullable();
            $table->string('email')->nullable();;
            $table->string('residence_address')->nullable();
            $table->boolean('is_disability')->nullable();
            $table->string('carer')->nullable();

            $table->unsignedBigInteger('relationship_id');
            $table->unsignedTinyInteger('identification_type_id');
            $table->unsignedBigInteger('marital_status_id');
            $table->unsignedTinyInteger('academic_level_id');
            $table->unsignedBigInteger('study_level_status_id');
            $table->unsignedBigInteger('activities_id');
            $table->unsignedBigInteger('inability_id')->nullable();
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');

            $table->timestamps();

            $table->index('relationship_id');
            $table->foreign('relationship_id')->references('id')
                ->on('relationship');

            $table->index('identification_type_id');
            $table->foreign('identification_type_id')->references('id')
                ->on('identification_type');

            $table->index('marital_status_id');
            $table->foreign('marital_status_id')->references('id')
                ->on('marital_status');

            $table->index('academic_level_id');
            $table->foreign('academic_level_id')->references('id')
                ->on('academic_level');

            $table->index('study_level_status_id');
            $table->foreign('study_level_status_id')->references('id')
                ->on('study_level_status');

            $table->index('activities_id');
            $table->foreign('activities_id')->references('id')
                ->on('activities');

            $table->index('inability_id');
            $table->foreign('inability_id')->references('id')
                ->on('inability');

            $table->index('type_record_id');
            $table->foreign('type_record_id')->references('id')
                ->on('type_record');

            $table->index('ch_record_id');
            $table->foreign('ch_record_id')->references('id')
                ->on('ch_record');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ch_sw_family');
    }
}
