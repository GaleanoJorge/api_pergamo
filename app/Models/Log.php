<?php

namespace App\Models;

use App\Models\Base\Log as BaseLog;

class Log extends BaseLog
{
	protected $fillable = [
		'user_id',
		'role_id',
		'date',
		'query',
		'time'
	];
}
