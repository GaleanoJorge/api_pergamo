<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Course;
use App\Models\InscriptionStatus;
use App\Models\Score;
use App\Models\UserCertificate;
use App\Models\UserGroupActivity;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRoleCourse
 * 
 * @property int $id
 * @property int $user_role_id
 * @property int $course_id
 * @property int $inscription_status_id
 * @property bool $is_extraordinary
 * @property string $observation
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Course $course
 * @property InscriptionStatus $inscription_status
 * @property UserRole $user_role
 * @property Collection|Score[] $scores
 * @property Collection|UserCertificate[] $user_certificates
 * @property Collection|UserGroupActivity[] $user_group_activities
 *
 * @package App\Models\Base
 */
class UserRoleCourse extends Model
{
	protected $table = 'user_role_course';

	protected $casts = [
		'user_role_id' => 'int',
		'course_id' => 'int',
		'inscription_status_id' => 'int',
		'is_extraordinary' => 'bool'
	];

	public function course()
	{
		return $this->belongsTo(Course::class);
	}

	public function inscription_status()
	{
		return $this->belongsTo(InscriptionStatus::class);
	}

	public function user_role()
	{
		return $this->belongsTo(UserRole::class);
	}

	public function scores()
	{
		return $this->hasMany(Score::class);
	}

	public function user_certificates()
	{
		return $this->hasMany(UserCertificate::class);
	}

	public function user_group_activities()
	{
		return $this->hasMany(UserGroupActivity::class);
	}
}
