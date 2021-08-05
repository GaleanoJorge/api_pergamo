<?php

namespace App\Models;

use App\Models\Base\AssignedStatus as BaseAssignedStatus;

class AssignedStatus extends BaseAssignedStatus
{
	protected $fillable = [
		'name'
	];
}
