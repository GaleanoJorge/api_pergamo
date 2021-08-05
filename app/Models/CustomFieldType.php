<?php

namespace App\Models;

use App\Models\Base\CustomFieldType as BaseCustomFieldType;

class CustomFieldType extends BaseCustomFieldType
{
	protected $fillable = [
		'name'
	];
}
