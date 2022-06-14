<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedCondition as BaseFixedCondition;

class FixedCondition extends BaseFixedCondition
{
protected $fillable = [
	'name',
	];
}
