<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedTypeRole as BaseFixedTypeRole;

class FixedTypeRole extends BaseFixedTypeRole
{
	protected $fillable = [
		'fixed_type_id',
		'role_id',
	];
}
