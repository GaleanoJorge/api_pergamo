<?php

namespace App\Models;

use App\Models\Base\Role as BaseRole;

class Role extends BaseRole
{
	protected $fillable = [
		'status_id',
		'name'
	];
}
