<?php

namespace App\Models;

use App\Models\Base\AssistanceSession as BaseAssistanceSession;

class AssistanceSession extends BaseAssistanceSession
{
	protected $fillable = [
		'session_id',
		'user_role_group_id',
		'start_time',
		'closing_time'
	];
}
