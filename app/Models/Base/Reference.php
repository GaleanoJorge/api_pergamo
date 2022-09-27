<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AdmissionRoute;
use App\Models\Admissions;
use App\Models\Campus;
use App\Models\Company;
use App\Models\Diagnosis;
use App\Models\Gender;
use App\Models\IdentificationType;
use App\Models\Patient;
use App\Models\Procedure;
use App\Models\Program;
use App\Models\ProvidersOfHealthServices;
use App\Models\ReferenceStatus;
use App\Models\RoleType;
use App\Models\Specialty;
use App\Models\StayType;
use App\Models\TechnologicalMedium;
use App\Models\TypeBriefcase;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reference
 * 
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $identification
 * @property boolean $re_input
 * @property string $age
 * @property string $intention
 * @property dateTime $presentation_date
 * @property dateTime $acceptance_date
 * @property dateTime $denied_date
 * @property int $patient_id
 * @property int $gender_id
 * @property int $identification_type_id
 * @property int $procedure_id
 * @property int $company_id
 * @property int $diagnosis_id
 * @property int $providers_of_health_services_id
 * @property int $stay_type_id
 * @property int $reference_status_id
 * @property int $request_campus_id
 * @property int $request_regime_id
 * @property int $request_user_id
 * @property int $request_technological_medium_id
 * @property int $request_admission_route_id
 * @property int $request_specialty_id
 * @property int $request_program_id
 * @property string $request_observation
 * @property int $acceptance_campus_id
 * @property int $acceptance_regime_id
 * @property int $acceptance_user_id
 * @property int $acceptance_technological_medium_id
 * @property int $acceptance_admission_route_id
 * @property int $acceptance_specialty_id
 * @property int $acceptance_program_id
 * @property int $tutor_id
 * @property string $acceptance_observation
 * @property int $denied_user_id
 * @property int $denied_technological_medium_id
 * @property int $denied_admission_route_id
 * @property int $denied_specialty_id
 * @property int $denied_type_id
 * @property int $denied_program_id
 * @property int $admissions_id
 * @property string $denied_observation
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Reference extends Model
{
	protected $table = 'reference';

	public function patient()
	{
		return $this->belongsTo(Patient::class, 'patient_id');
	}

	public function gender()
	{
		return $this->belongsTo(Gender::class, 'gender_id');
	}

	public function identification_type()
	{
		return $this->belongsTo(IdentificationType::class, 'identification_type_id');
	}

	public function procedure()
	{
		return $this->belongsTo(Procedure::class, 'procedure_id');
	}

	public function company()
	{
		return $this->belongsTo(Company::class, 'company_id');
	}

	public function diagnosis()
	{
		return $this->belongsTo(Diagnosis::class, 'diagnosis_id');
	}

	public function providers_of_health_services()
	{
		return $this->belongsTo(ProvidersOfHealthServices::class, 'providers_of_health_services_id');
	}

	public function stay_type()
	{
		return $this->belongsTo(StayType::class, 'stay_type_id');
	}

	public function reference_status()
	{
		return $this->belongsTo(ReferenceStatus::class, 'reference_status_id');
	}

	public function request_campus()
	{
		return $this->belongsTo(Campus::class, 'request_campus_id');
	}

	public function request_regime()
	{
		return $this->belongsTo(TypeBriefcase::class, 'request_regime_id');
	}

	public function request_user()
	{
		return $this->belongsTo(User::class, 'request_user_id');
	}

	public function request_technological_medium()
	{
		return $this->belongsTo(TechnologicalMedium::class, 'request_technological_medium_id');
	}

	public function request_admission_route()
	{
		return $this->belongsTo(AdmissionRoute::class, 'request_admission_route_id');
	}

	public function request_specialty()
	{
		return $this->belongsTo(Specialty::class, 'request_specialty_id');
	}

	public function request_program()
	{
		return $this->belongsTo(Program::class, 'request_program_id');
	}

	public function acceptance_campus()
	{
		return $this->belongsTo(Campus::class, 'acceptance_campus_id');
	}

	public function acceptance_regime()
	{
		return $this->belongsTo(TypeBriefcase::class, 'acceptance_regime_id');
	}

	public function acceptance_user()
	{
		return $this->belongsTo(User::class, 'acceptance_user_id');
	}

	public function acceptance_technological_medium()
	{
		return $this->belongsTo(TechnologicalMedium::class, 'acceptance_technological_medium_id');
	}

	public function acceptance_admission_route()
	{
		return $this->belongsTo(AdmissionRoute::class, 'acceptance_admission_route_id');
	}

	public function acceptance_specialty()
	{
		return $this->belongsTo(Specialty::class, 'acceptance_specialty_id');
	}

	public function acceptance_program()
	{
		return $this->belongsTo(Program::class, 'acceptance_program_id');
	}

	public function tutor()
	{
		return $this->belongsTo(User::class, 'tutor_id');
	}

	public function denied_user()
	{
		return $this->belongsTo(User::class, 'denied_user_id');
	}

	public function denied_technological_medium()
	{
		return $this->belongsTo(TechnologicalMedium::class, 'denied_technological_medium_id');
	}

	public function denied_admission_route()
	{
		return $this->belongsTo(AdmissionRoute::class, 'denied_admission_route_id');
	}

	public function denied_specialty()
	{
		return $this->belongsTo(Specialty::class, 'denied_specialty_id');
	}

	public function denied_type()
	{
		return $this->belongsTo(RoleType::class, 'denied_type_id');
	}

	public function denied_program()
	{
		return $this->belongsTo(Program::class, 'denied_program_id');
	}

	public function admissions()
	{
		return $this->belongsTo(Admissions::class, 'admissions_id');
	}
}
