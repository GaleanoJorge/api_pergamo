<?php

namespace App\Models;

use App\Models\Base\Module as BaseModule;

class Module extends BaseModule
{
	protected $fillable = [
		'course_id',
		'name',
		'description'
	];
}
