<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AcademicLevel;
use App\Models\Category;
use App\Models\Contract;
use App\Models\Course;
use App\Models\Admissions;
use App\Models\Curriculum;
use App\Models\Delivery;
use App\Models\Ethnicity;
use App\Models\Event;
use App\Models\EventTicket;
use App\Models\Gender;
use App\Models\HistoryEventApproved;
use App\Models\IdentificationType;
use App\Models\Log;
use App\Models\LogLogin;
use App\Models\Municipality;
use App\Models\Origin;
use App\Models\ReasonConsultation;
use App\Models\Role;
use App\Models\Status;
use App\Models\UserAssignSurvey;
use App\Models\UserCertificate;
use App\Models\UserUser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property int $status_id
 * @property int $gender_id
 * @property string $gender_type
 * @property bool $is_disability
 * @property string $disability
 * @property int $ethnicity_id
 * @property int $academic_level_id
 * @property int $identification_type_id
 * @property int $birthplace_municipality_id
 * @property string $username
 * @property string $email
 * @property Carbon $email_verified_at
 * @property string $password
 * @property string $firstname
 * @property string $middlefirstname
 * @property string $lastname
 * @property string $middlelastname
 * @property string $identification
 * @property Carbon $birthday
 * @property int $phone
 * @property int $landline
 * @property int $sync_id
 * @property int $age
 * @property bool $force_reset_password
 * @property int $sga_origin_fk
 * @property string $remember_token
 * @property bool $is_judicial_branch
 * @property string $file
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property AcademicLevel $academic_level
 * @property Municipality $municipality
 * @property Ethnicity $ethnicity
 * @property Gender $gender
 * @property IdentificationType $identification_type
 * @property Status $status
 * @property Collection|Category[] $categories
 * @property Collection|Contract[] $contracts
 * @property Collection|Course[] $courses
 * @property Collection|Curriculum[] $curricula
 * @property Collection|Delivery[] $deliveries
 * @property Collection|Event[] $events
 * @property Collection|EventTicket[] $event_tickets
 * @property Collection|HistoryEventApproved[] $history_event_approveds
 * @property Collection|LogLogin[] $log_logins
 * @property Collection|Log[] $logs
 * @property Collection|Origin[] $origins
 * @property Collection|UserAssignSurvey[] $user_assign_surveys
 * @property Collection|UserCertificate[] $user_certificates
 * @property Collection|Role[] $roles
 * @property Collection|UserUser[] $user_users
 *
 * @package App\Models\Base
 */
class Patient extends Model
{
	protected $table = 'patients';

	protected $casts = [
		'status_id' => 'int',
		'gender_id' => 'int',
		'is_disability' => 'bool',
		'ethnicity_id' => 'int',
		'academic_level_id' => 'int',
		'identification_type_id' => 'int',
		'birthplace_municipality_id' => 'int',
		'phone' => 'int',
		'landline' => 'int',
		'sync_id' => 'int',
		'age' => 'int',
		'sga_origin_fk' => 'int',
		'is_judicial_branch' => 'bool'
	];

	protected $dates = [
		'email_verified_at',
		'birthday'
	];

	public function academic_level()
	{
		return $this->belongsTo(AcademicLevel::class);
	}

	public function municipality()
	{
		return $this->belongsTo(Municipality::class, 'birthplace_municipality_id');
	}

	public function ethnicity()
	{
		return $this->belongsTo(Ethnicity::class);
	}

	public function gender()
	{
		return $this->belongsTo(Gender::class);
	}

	public function identification_type()
	{
		return $this->belongsTo(IdentificationType::class);
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function categories()
	{
		return $this->hasMany(Category::class);
	}

	public function contracts()
	{
		return $this->hasMany(Contract::class);
	}

	public function courses()
	{
		return $this->hasMany(Course::class);
	}

	public function curricula()
	{
		return $this->hasMany(Curriculum::class);
	}

	public function deliveries()
	{
		return $this->hasMany(Delivery::class);
	}

	public function events()
	{
		return $this->hasMany(Event::class);
	}

	public function event_tickets()
	{
		return $this->hasMany(EventTicket::class, 'passenger_user_id');
	}

	public function history_event_approveds()
	{
		return $this->hasMany(HistoryEventApproved::class);
	}

	public function log_logins()
	{
		return $this->hasMany(LogLogin::class);
	}

	public function logs()
	{
		return $this->hasMany(Log::class);
	}

	public function origins()
	{
		return $this->belongsToMany(Origin::class, 'user_origin')
					->withPivot('id')
					->withTimestamps();
	}

	public function user_assign_surveys()
	{
		return $this->hasMany(UserAssignSurvey::class);
	}

	public function user_certificates()
	{
		return $this->hasMany(UserCertificate::class);
	}

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'user_role')
					->withPivot('id', 'sga_origin_fk')
					->withTimestamps();
	}

	public function user_users()
	{
		return $this->hasMany(UserUser::class, 'user_parent_id');
	}

	public function admissions()
	{
		return $this->belongsToMany(Patient::class,'admissions')
		->withPivot('patient_id')
		->withTimestamps();
	}

	// public function pac_monitoring()
	// {
	// 	return $this->belongsToMany(User::class,'pac_monitoring')
	// 	->withPivot('user_id')
	// 	->withTimestamps();
	// }
	
	// public function reason_consultation()
	// {
	// 	return $this->belongsToMany(User::class,'reason_consultation')
	// 	->withPivot('user_id')
	// 	->withTimestamps();
	// }
}
