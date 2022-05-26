<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedProperty as BaseFixedProperty;

class FixedProperty extends BaseFixedProperty
{
protected $fillable = [
	'name',
	];
}
