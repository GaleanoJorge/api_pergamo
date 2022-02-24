<?php

namespace App\Models;

use App\Models\Base\DietComponent as BaseDietComponent;

class DietComponent extends BaseDietComponent
{
	protected $fillable = [
		'name',
		'description',
	];
}
