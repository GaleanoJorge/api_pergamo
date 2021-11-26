<?php

namespace App\Models;

use App\Models\Base\ObjetionType as BaseObjetionType;

class ObjetionType extends BaseObjetionType
{
	protected $fillable = [
		'name'
	];
}
