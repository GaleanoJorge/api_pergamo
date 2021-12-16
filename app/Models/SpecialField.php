<?php

namespace App\Models;

use App\Models\Base\SpecialField as BaseSpecialField;

class SpecialField extends BaseSpecialField
{
	protected $fillable = [
		'name',
		'type_professional_id'
	];
}
