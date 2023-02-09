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
            $table->string('firm_patient')->nullable();
            $table->string('firm_responsible')->nullable();
            $table->unsignedBigInteger('assigned_user_id')->nullable();
            $table->unsignedBigInteger('type_consents_id');
            $table->unsignedBigInteger('relationship_id')->nullable();
            $table->string('observations')->nullable();
            $table->string('because_patient')->nullable();
            $table->string('because_carer')->nullable();
            $table->string('number_contact')->nullable();
            $table->string('confirmation')->nullable();
            $table->string('dissent')->nullable();
            $table->string('name_responsible')->nullable();
            $table->string('identification_responsible')->nullable();
            $table->string('parent_responsible')->nullable();
            $table->unsignedBigInteger('ch_record_id')->nullable();
            $table->string('name')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();


            $table->index('admissions_id');
            $table->index('assigned_user_id');
            $table->index('type_consents_id');
            $table->index('relationship_id');


            $table->foreign('admissions_id')->references('id')
                ->on('admissions');
            $table->foreign('assigned_user_id')->references('id')
                ->on('users');
            $table->foreign('type_consents_id')->references('id')
                ->on('type_consents');
            $table->foreign('relationship_id')->references('id')
                ->on('relationship');

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
        Schema::dropIfExists('consents_informed');
    }
}
