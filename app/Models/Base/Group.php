<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Course;
use App\Models\District;
use App\Models\Session;
use App\Models\TargetPeopleGroup;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Group
 * 
 * @property int $id
 * @property int $course_id
 * @property string $name
 * @property string $description
 * @property int $code
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Course $course
 * @property Collection|District[] $districts
 * @property Collection|Session[] $sessions
 * @property Collection|TargetPeopleGroup[] $target_people_groups
 * @property Collection|UserRole[] $user_roles
 *
 * @package App\Models\Base
 */
class Group extends Model
{
	protected $table = 'group';

	protected $casts = [
		'course_id' => 'int',
		'code' => 'int'
	];

	public function course()
	{
		return $this->belongsTo(Course::class);
	}

	public function districts()
	{
		return $this->belongsToMany(District::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function sessions()
	{
		return $this->hasMany(Session::class);
	}

	public function target_people_groups()
	{
		return $this->hasMany(TargetPeopleGroup::class);
	}

	public function user_roles()
	{
		return $this->belongsToMany(UserRole::class, 'user_role_group')
					->withPivot('id', 'status_id')
					->withTimestamps();
	}
}
