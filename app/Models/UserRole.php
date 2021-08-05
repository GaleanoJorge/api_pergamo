<?php

namespace App\Models;

use App\Models\Base\UserRole as BaseUserRole;

class UserRole extends BaseUserRole
{
	protected $fillable = [
		'user_id',
		'role_id'
	];

	public function user()
	{
		return $this->belongsTo('App\Models\User', 'user_id');
	}

	public function user_role_course()
	{
		return $this->hasMany(UserRoleCourse::class);
	}

	public function user_role_group()
	{
		return $this->hasMany(UserRoleGroup::class);
	}
}
