<?php

namespace App\Models;

use App\Models\Base\UserCampus as BaseUserCampus;

class UserCampus extends BaseUserCampus
{
	protected $fillable = [
		'user_id',
		'campus_id'
	];
}
