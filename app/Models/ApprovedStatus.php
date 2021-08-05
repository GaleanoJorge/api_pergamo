<?php

namespace App\Models;

use App\Models\Base\ApprovedStatus as BaseApprovedStatus;

class ApprovedStatus extends BaseApprovedStatus
{
	protected $fillable = [
		'name'
	];
}
