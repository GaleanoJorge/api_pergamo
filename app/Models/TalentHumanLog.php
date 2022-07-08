<?php

namespace App\Models;

use App\Models\Base\TalentHumanLog as BaseTalentHumanLog;

class TalentHumanLog extends BaseTalentHumanLog
{
	protected $fillable = [
		'talent_human_action_id',
		'talent_human_user_id',
		'user_id',
	];
}
