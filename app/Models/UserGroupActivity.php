<?php

namespace App\Models;

use App\Models\Base\UserGroupActivity as BaseUserGroupActivity;

class UserGroupActivity extends BaseUserGroupActivity
{
	protected $fillable = [
		'user_role_course_id',
		'group_activity_id'
	];
}
