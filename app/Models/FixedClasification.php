<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedClasification as BaseFixedClasification;

class FixedClasification extends BaseFixedClasification
{
protected $fillable = [
	'name',
	'fixed_code_id',
	'fixed_type_id',
	];
}
