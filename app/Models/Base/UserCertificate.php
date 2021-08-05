<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\User;
use App\Models\UserRoleCourse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserCertificate
 * 
 * @property int $id
 * @property int $user_role_course_id
 * @property int $user_employee_id
 * @property int $user_id
 * @property string $url_certificate
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 * @property UserRoleCourse $user_role_course
 *
 * @package App\Models\Base
 */
class UserCertificate extends Model
{
	protected $table = 'user_certificate';

	protected $casts = [
		'user_role_course_id' => 'int',
		'user_employee_id' => 'int',
		'user_id' => 'int'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function user_role_course()
	{
		return $this->belongsTo(UserRoleCourse::class);
	}
}
