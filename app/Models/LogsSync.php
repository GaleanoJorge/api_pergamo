<?php

namespace App\Models;

use App\Models\Base\LogsSync as BaseLogsSync;

class LogsSync extends BaseLogsSync
{
	protected $fillable = [
		'educational_institution_id',
		'service'
	];
}
