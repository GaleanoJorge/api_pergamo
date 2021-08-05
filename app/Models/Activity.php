<?php

namespace App\Models;

use App\Models\Base\Activity as BaseActivity;

class Activity extends BaseActivity
{
	protected $fillable = [
		'session_id',
		'activity_type_id',
		'name',
		'description'
	];
}
