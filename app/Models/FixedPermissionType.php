<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedPermissionType as BaseFixedPermissionType;

class FixedPermissionType extends BaseFixedPermissionType
{
protected $fillable = [
	'permission_id',
	'fixed_type_id',
	'user_id',
	];
}
