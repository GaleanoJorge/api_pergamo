<?php

namespace App\Models;

use App\Models\Base\ObjetionCode as BaseObjetionCode;

class ObjetionCode extends BaseObjetionCode
{
	protected $fillable = [
		'code',
		'name'
	];
}
