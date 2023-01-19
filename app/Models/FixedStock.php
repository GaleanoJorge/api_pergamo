<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedStock as BaseFixedStock;

class FixedStock extends BaseFixedStock
{
	protected $fillable = [
		'fixed_type_id',
		'campus_id',
	];
}
