<?php

namespace App\Models;

use App\Models\Base\LogLogin as BaseLogLogin;

class LogLogin extends BaseLogLogin
{
	protected $fillable = [
		'user_id',
		'role_id'
	];
}
