<?php

namespace App\Models;

use App\Models\Base\DistrictGroup as BaseDistrictGroup;

class DistrictGroup extends BaseDistrictGroup
{
	protected $fillable = [
		'group_id',
		'district_id'
	];
}
