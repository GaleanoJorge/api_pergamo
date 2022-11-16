
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reference', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('identification', 100)->nullable();
            $table->boolean('re_input');
            $table->integer('age')->nullable();
            $table->integer('intention');

            $table->dateTime('presentation_date');
            $table->dateTime('acceptance_date')->nullable();
            $table->dateTime('denied_date')->nullable();

            $table->unsignedBigInteger('patient_id')->nullable();
            $table->unsignedTinyInteger('gender_id');
            $table->unsignedTinyInteger('identification_type_id')->nullable();
            $table->unsignedBigInteger('procedure_id')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('diagnosis_id');
            $table->unsignedBigInteger('providers_of_health_services_id');
            $table->unsignedBigInteger('stay_type_id');

            $table->unsignedBigInteger('reference_status_id');

            $table->unsignedBigInteger('request_campus_id')->nullable();
            $table->unsignedBigInteger('request_regime_id')->nullable();
            $table->integer('request_regime_level')->nullable();
            $table->unsignedBigInteger('request_user_id')->nullable();
            $table->unsignedBigInteger('request_technological_medium_id')->nullable();
            $table->unsignedBigInteger('request_admission_route_id')->nullable();
            $table->unsignedBigInteger('request_specialty_id')->nullable();
            $table->unsignedBigInteger('request_program_id')->nullable();
            $table->string('request_observation')->nullable();

            $table->unsignedBigInteger('acceptance_campus_id')->nullable();
            $table->unsignedBigInteger('acceptance_flat_id')->nullable();
            $table->unsignedBigInteger('acceptance_pavilion_id')->nullable();
            $table->unsignedBigInteger('acceptance_bed_id')->nullable();
            $table->unsignedBigInteger('acceptance_regime_id')->nullable();
            $table->integer('acceptance_regime_level')->nullable();
            $table->unsignedBigInteger('acceptance_user_id')->nullable();
            $table->unsignedBigInteger('acceptance_technological_medium_id')->nullable();
            $table->unsignedBigInteger('acceptance_admission_route_id')->nullable();
            $table->unsignedBigInteger('acceptance_specialty_id')->nullable();
            $table->unsignedBigInteger('acceptance_program_id')->nullable();
            $table->unsignedBigInteger('tutor_id')->nullable();
            $table->string('acceptance_observation')->nullable();


            $table->unsignedBigInteger('denied_user_id')->nullable();
            $table->unsignedBigInteger('denied_technological_medium_id')->nullable();
            $table->unsignedBigInteger('denied_admission_route_id')->nullable();
            $table->unsignedBigInteger('denied_specialty_id')->nullable();
            $table->unsignedTinyInteger('denied_type_id')->nullable();
            $table->unsignedBigInteger('denied_reason_id')->nullable();
            $table->unsignedBigInteger('denied_program_id')->nullable();
            $table->string('denied_observation')->nullable();

            $table->unsignedBigInteger('admissions_id')->nullable();

            $table->timestamps();

            $table->index('admissions_id');
            $table->foreign('admissions_id')->references('id')
                ->on('admissions');

            $table->index('request_program_id');
            $table->foreign('request_program_id')->references('id')
                ->on('program');

            $table->index('request_specialty_id');
            $table->foreign('request_specialty_id')->references('id')
                ->on('specialty');

            $table->index('request_admission_route_id');
            $table->foreign('request_admission_route_id')->references('id')
                ->on('admission_route');

            $table->index('request_technological_medium_id');
            $table->foreign('request_technological_medium_id')->references('id')
                ->on('technological_medium');

            $table->index('request_user_id');
            $table->foreign('request_user_id')->references('id')
                ->on('users');

            $table->index('request_regime_id');
            $table->foreign('request_regime_id')->references('id')
                ->on('type_briefcase');

            $table->index('request_campus_id');
            $table->foreign('request_campus_id')->references('id')
                ->on('campus');








            $table->index('acceptance_program_id');
            $table->foreign('acceptance_program_id')->references('id')
                ->on('program');

            $table->index('acceptance_specialty_id');
            $table->foreign('acceptance_specialty_id')->references('id')
                ->on('specialty');

            $table->index('acceptance_admission_route_id');
            $table->foreign('acceptance_admission_route_id')->references('id')
                ->on('admission_route');

            $table->index('acceptance_technological_medium_id');
            $table->foreign('acceptance_technological_medium_id')->references('id')
                ->on('technological_medium');

            $table->index('acceptance_user_id');
            $table->foreign('acceptance_user_id')->references('id')
                ->on('users');

            $table->index('acceptance_regime_id');
            $table->foreign('acceptance_regime_id')->references('id')
                ->on('type_briefcase');

            $table->index('acceptance_campus_id');
            $table->foreign('acceptance_campus_id')->references('id')
                ->on('campus');
                
            $table->index('acceptance_flat_id');
            $table->foreign('acceptance_flat_id')->references('id')
                ->on('flat');

            $table->index('acceptance_pavilion_id');
            $table->foreign('acceptance_pavilion_id')->references('id')
                ->on('pavilion');
                
            $table->index('acceptance_bed_id');
            $table->foreign('acceptance_bed_id')->references('id')
                ->on('bed');






            $table->index('denied_type_id');
            $table->foreign('denied_type_id')->references('id')
                ->on('role_type');

            $table->index('denied_reason_id');
            $table->foreign('denied_reason_id')->references('id')
                ->on('denied_reason');

            $table->index('denied_program_id');
            $table->foreign('denied_program_id')->references('id')
                ->on('program');

            $table->index('denied_specialty_id');
            $table->foreign('denied_specialty_id')->references('id')
                ->on('specialty');

            $table->index('denied_admission_route_id');
            $table->foreign('denied_admission_route_id')->references('id')
                ->on('admission_route');

            $table->index('denied_technological_medium_id');
            $table->foreign('denied_technological_medium_id')->references('id')
                ->on('technological_medium');

            $table->index('denied_user_id');
            $table->foreign('denied_user_id')->references('id')
                ->on('users');






            $table->index('reference_status_id');
            $table->foreign('reference_status_id')->references('id')
                ->on('reference_status');

            $table->index('stay_type_id');
            $table->foreign('stay_type_id')->references('id')
                ->on('stay_type');

            $table->index('providers_of_health_services_id');
            $table->foreign('providers_of_health_services_id')->references('id')
                ->on('providers_of_health_services');


            $table->index('tutor_id');
            $table->foreign('tutor_id')->references('id')
                ->on('users');

            $table->index('gender_id');
            $table->foreign('gender_id')->references('id')
                ->on('gender');

            $table->index('procedure_id');
            $table->foreign('procedure_id')->references('id')
                ->on('procedure');

            $table->index('patient_id');
            $table->foreign('patient_id')->references('id')
                ->on('patients');

            $table->index('company_id');
            $table->foreign('company_id')->references('id')
                ->on('company');

            $table->index('diagnosis_id');
            $table->foreign('diagnosis_id')->references('id')
                ->on('diagnosis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reference');
    }
}
