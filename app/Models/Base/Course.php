<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Campus;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Competition;
use App\Models\CourseApproval;
use App\Models\CourseState;
use App\Models\CourseType;
use App\Models\Coursebase;
use App\Models\CustomField;
use App\Models\EducationalInstitution;
use App\Models\EntityType;
use App\Models\Event;
use App\Models\Group;
use App\Models\Module;
use App\Models\Origin;
use App\Models\SurveyInstance;
use App\Models\SurveySection;
use App\Models\Theme;
use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 * 
 * @property int $id
 * @property int $origin_id
 * @property int $category_id
 * @property int $campus_id
 * @property int $entity_type_id
 * @property int $user_id
 * @property int $coursebase_id
 * @property int $course_type_id
 * @property int $certificates_id
 * @property int $course_states_id
 * @property string $course_template
 * @property int $quota
 * @property Carbon $start_date
 * @property Carbon $finish_date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Campus $campus
 * @property Category $category
 * @property Certificate $certificate
 * @property CourseState $course_state
 * @property CourseType $course_type
 * @property Coursebase $coursebase
 * @property EntityType $entity_type
 * @property Origin $origin
 * @property User $user
 * @property Collection|Competition[] $competitions
 * @property Collection|CourseApproval[] $course_approvals
 * @property Collection|EducationalInstitution[] $educational_institutions
 * @property Collection|Module[] $modules
 * @property Collection|Theme[] $themes
 * @property Collection|CustomField[] $custom_fields
 * @property Collection|Event[] $events
 * @property Collection|Group[] $groups
 * @property Collection|SurveyInstance[] $survey_instances
 * @property Collection|SurveySection[] $survey_sections
 * @property Collection|UserRole[] $user_roles
 *
 * @package App\Models\Base
 */
class Course extends Model
{
	protected $table = 'course';

	protected $casts = [
		'origin_id' => 'int',
		'category_id' => 'int',
		'campus_id' => 'int',
		'entity_type_id' => 'int',
		'user_id' => 'int',
		'coursebase_id' => 'int',
		'course_type_id' => 'int',
		'certificates_id' => 'int',
		'course_states_id' => 'int',
		'quota' => 'int'
	];

	protected $dates = [
		'start_date',
		'finish_date'
	];

	public function campus()
	{
		return $this->belongsTo(Campus::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function certificate()
	{
		return $this->belongsTo(Certificate::class, 'certificates_id');
	}

	public function course_state()
	{
		return $this->belongsTo(CourseState::class, 'course_states_id');
	}

	public function course_type()
	{
		return $this->belongsTo(CourseType::class);
	}

	public function coursebase()
	{
		return $this->belongsTo(Coursebase::class);
	}

	public function entity_type()
	{
		return $this->belongsTo(EntityType::class);
	}

	public function origin()
	{
		return $this->belongsTo(Origin::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function competitions()
	{
		return $this->belongsToMany(Competition::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function course_approvals()
	{
		return $this->hasMany(CourseApproval::class);
	}

	public function educational_institutions()
	{
		return $this->belongsToMany(EducationalInstitution::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function modules()
	{
		return $this->belongsToMany(Module::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function themes()
	{
		return $this->belongsToMany(Theme::class, 'course_themes', 'course_id', 'themes_id')
					->withPivot('id')
					->withTimestamps();
	}

	public function custom_fields()
	{
		return $this->belongsToMany(CustomField::class, 'custom_field_course')
					->withPivot('id', 'value')
					->withTimestamps();
	}

	public function events()
	{
		return $this->hasMany(Event::class);
	}

	public function groups()
	{
		return $this->hasMany(Group::class);
	}

	public function survey_instances()
	{
		return $this->hasMany(SurveyInstance::class);
	}

	public function survey_sections()
	{
		return $this->hasMany(SurveySection::class);
	}

	public function user_roles()
	{
		return $this->belongsToMany(UserRole::class, 'user_role_course')
					->withPivot('id', 'inscription_status_id', 'is_extraordinary', 'observation')
					->withTimestamps();
	}
}
