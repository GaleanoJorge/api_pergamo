<?php

namespace App\Models;

use App\Models\Base\AuthLog as BaseAuthLog;

class AuthLog extends BaseAuthLog
{
	protected $fillable = [
		'id',
		'user_id',
		'authorization_id',
		'current_status_id',
	];
}
