<?php

namespace App\Models;

use App\Models\Base\Group as BaseGroup;

class Group extends BaseGroup
{
	protected $fillable = [
		'course_id',
		'name',
		'description',
		'code'
	];

	public function user_role_group()
	{
		return $this->hasMany(UserRoleGroup::class);
	}
}
