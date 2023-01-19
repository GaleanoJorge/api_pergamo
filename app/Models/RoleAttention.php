<?php

namespace App\Models;

use App\Models\Base\RoleAttention as BaseRoleAttention;

class RoleAttention extends BaseRoleAttention
{
	protected $fillable = [
		'role_id',
		'type_of_attention_id',
	];
}
