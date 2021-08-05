<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Category;
use App\Models\Course;
use App\Models\CustomField;
use App\Models\EducationalInstitution;
use App\Models\Group;
use App\Models\Role;
use App\Models\SurveySection;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRole
 *
 * @property int $id
 * @property int $user_id
 * @property int $role_id
 * @property int $sga_origin_fk
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Role $role
 * @property User $user
 * @property Collection|CustomField[] $custom_fields
 * @property Collection|SurveySection[] $survey_sections
 * @property Collection|Category[] $categories
 * @property Collection|Course[] $courses
 * @property Collection|EducationalInstitution[] $educational_institutions
 * @property Collection|Group[] $groups
 *
 * @package App\Models\Base
 */
class UserRole extends Model
{
	protected $table = 'user_role';

	protected $casts = [
		'user_id' => 'int',
		'role_id' => 'int',
		'sga_origin_fk' => 'int'
	];

	public function role()
	{
		return $this->belongsTo(Role::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function custom_fields()
	{
		return $this->belongsToMany(CustomField::class)
					->withPivot('id', 'value')
					->withTimestamps();
	}

	public function survey_sections()
	{
		return $this->hasMany(SurveySection::class);
	}

	public function categories()
	{
		return $this->belongsToMany(Category::class, 'user_role_category_inscription')
					->withPivot('id', 'inscription_status_id', 'is_extraordinary', 'observation')
					->withTimestamps();
	}

	public function courses()
	{
		return $this->belongsToMany(Course::class, 'user_role_course')
					->withPivot('id', 'inscription_status_id', 'is_extraordinary', 'observation')
					->withTimestamps();
	}

	public function educational_institutions()
	{
		return $this->belongsToMany(EducationalInstitution::class, 'user_role_educational_institution')
					->withPivot('id')
					->withTimestamps();
	}

	public function groups()
	{
		return $this->belongsToMany(Group::class, 'user_role_group')
					->withPivot('id', 'status_id')
					->withTimestamps();
	}
}
