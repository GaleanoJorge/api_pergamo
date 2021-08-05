<?php

namespace App\Models;

use App\Models\Base\ItemRolePermission as BaseItemRolePermission;

class ItemRolePermission extends BaseItemRolePermission
{
	protected $fillable = [
		'item_id',
		'role_id',
		'permission_id'
	];
}
