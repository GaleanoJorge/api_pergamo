<?php

namespace App\Models;

use App\Models\Base\TargetPeopleGroup as BaseTargetPeopleGroup;

class TargetPeopleGroup extends BaseTargetPeopleGroup
{
	protected $fillable = [
		'group_id',
		'target_people_id'
	];
}
