<?php

namespace App\Models;

use App\Models\Base\DeniedReason as BaseDeniedReason;

class DeniedReason extends BaseDeniedReason
{
	protected $fillable = [
		'name',
		'denied_type_id',
	];
}
