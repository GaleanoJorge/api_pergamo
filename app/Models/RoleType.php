<?php

namespace App\Models;

use App\Models\Base\RoleType as BaseRoleType;

class RoleType extends BaseRoleType
{
	protected $fillable = [
		'name',
	];
}
