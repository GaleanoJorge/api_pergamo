<?php

namespace App\Models;

use App\Models\Base\ObjetionCodeResponse as BaseObjetionCodeResponse;

class ObjetionCodeResponse extends BaseObjetionCodeResponse
{
	protected $fillable = [
		'code',
		'name'
	];
}
