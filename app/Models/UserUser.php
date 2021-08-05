<?php

namespace App\Models;

use App\Models\Base\UserUser as BaseUserUser;

class UserUser extends BaseUserUser
{
	protected $fillable = [
		'user_id',
		'user_parent_id'
	];
}
