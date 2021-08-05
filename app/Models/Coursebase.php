<?php

namespace App\Models;

use App\Models\Base\Coursebase as BaseCoursebase;

class Coursebase extends BaseCoursebase
{
	protected $fillable = [
		'category_id',
		'name'
	];
}
