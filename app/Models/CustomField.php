<?php

namespace App\Models;

use App\Models\Base\CustomField as BaseCustomField;

class CustomField extends BaseCustomField
{
	protected $fillable = [
		'custom_field_type_id',
        'key',
        'name'
	];
}
