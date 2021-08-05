<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\GroupActivity;
use App\Models\UserRoleCourse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserGroupActivity
 * 
 * @property int $id
 * @property int $user_role_course_id
 * @property int $group_activity_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property GroupActivity $group_activity
 * @property UserRoleCourse $user_role_course
 *
 * @package App\Models\Base
 */
class UserGroupActivity extends Model
{
	protected $table = 'user_group_activity';

	protected $casts = [
		'user_role_course_id' => 'int',
		'group_activity_id' => 'int'
	];

	public function group_activity()
	{
		return $this->belongsTo(GroupActivity::class);
	}

	public function user_role_course()
	{
		return $this->belongsTo(UserRoleCourse::class);
	}
}
