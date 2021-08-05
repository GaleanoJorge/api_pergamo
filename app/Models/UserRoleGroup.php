<?php

namespace App\Models;

use App\Models\Base\UserRoleGroup as BaseUserRoleGroup;
use App\Models\AssistanceSession;

class UserRoleGroup extends BaseUserRoleGroup
{
	protected $fillable = [
		'user_role_id',
		'group_id',
		'status_id'
	];

	public function assistance_session()
	{
		return $this->hasMany(AssistanceSession::class);
	}
}
