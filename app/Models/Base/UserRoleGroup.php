<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AssistanceSession;
use App\Models\Group;
use App\Models\Status;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRoleGroup
 * 
 * @property int $id
 * @property int $user_role_id
 * @property int $group_id
 * @property int $status_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Group $group
 * @property Status $status
 * @property UserRole $user_role
 * @property Collection|AssistanceSession[] $assistance_sessions
 *
 * @package App\Models\Base
 */
class UserRoleGroup extends Model
{
	protected $table = 'user_role_group';

	protected $casts = [
		'user_role_id' => 'int',
		'group_id' => 'int',
		'status_id' => 'int'
	];

	public function group()
	{
		return $this->belongsTo(Group::class);
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function user_role()
	{
		return $this->belongsTo(UserRole::class);
	}

	public function assistance_sessions()
	{
		return $this->hasMany(AssistanceSession::class);
	}
}
