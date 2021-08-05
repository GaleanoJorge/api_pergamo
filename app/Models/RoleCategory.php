<?php

namespace App\Models;

use App\Models\Base\RoleCategory as BaseRoleCategory;

class RoleCategory extends BaseRoleCategory
{
	protected $fillable = [
		'category_id',
		'role_id'
	];
}
