<?php

namespace App\Models;

use App\Models\Base\UserAssignSurvey as BaseUserAssignSurvey;

class UserAssignSurvey extends BaseUserAssignSurvey
{
	protected $fillable = [
		'survey_instance_id',
		'assigned_status_id',
		'user_id',
		'duration',
		'dt_init',
		'dt_finish',
		'qualification',
		'qualification_claim',
		'comments'
	];

	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
