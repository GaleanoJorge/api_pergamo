<?php

namespace App\Models;

use App\Models\Base\GroupActivity as BaseGroupActivity;

class GroupActivity extends BaseGroupActivity
{
	protected $fillable = [
		'activity_id',
		'name'
	];
}
