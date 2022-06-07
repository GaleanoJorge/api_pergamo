<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedType as BaseFixedType;

class FixedType extends BaseFixedType
{
	protected $fillable = [
		'name',
	];
}
