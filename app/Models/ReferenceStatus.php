<?php

namespace App\Models;

use App\Models\Base\ReferenceStatus as BaseReferenceStatus;

class ReferenceStatus extends BaseReferenceStatus
{
	protected $fillable = [
		'name',
	];
}
