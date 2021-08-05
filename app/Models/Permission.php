<?php

namespace App\Models;

use App\Models\Base\Permission as BasePermission;

class Permission extends BasePermission
{
	protected $fillable = [
		'name',
		'class',
		'icon',
		'action',
	];
}
