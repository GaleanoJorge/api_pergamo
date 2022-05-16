<?php

namespace App\Models;

use App\Models\Base\HumanTalentRequest as BaseHumanTalentRequest;


class HumanTalentRequest extends BaseHumanTalentRequest
{
	protected $fillable = [
		'admissions_id',
		'management_plan_id',
		'observation',
		'status'
	];

}
