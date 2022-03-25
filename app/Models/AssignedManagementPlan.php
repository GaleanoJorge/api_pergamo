<?php

namespace App\Models;

use App\Models\Base\AssignedManagementPlan as BaseAssignedManagementPlan;

class AssignedManagementPlan extends BaseAssignedManagementPlan
{
	protected $fillable = [
		'start_date',
		'finish_date',
		'user_id',
		'execution_date',
		'management_plan_id'
	];
}
