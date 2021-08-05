<?php

namespace App\Models;

use App\Models\Base\CustomFieldUserRole as BaseCustomFieldUserRole;

class CustomFieldUserRole extends BaseCustomFieldUserRole
{
	protected $fillable = [
		'custom_field_id',
		'user_role_id',
		'value'
	];
}
