<?php

namespace App\Models;

use App\Models\Base\Process as BaseProcess;

class Process extends BaseProcess
{
	protected $fillable = [
		'process_type_id',
		'user_id',
		'message',
		'state'
	];
}
