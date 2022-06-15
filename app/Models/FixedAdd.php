<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedAdd as BaseFixedAdd;

class FixedAdd extends BaseFixedAdd
{
	protected $fillable = [
		'fixed_assets_id',
		'fixed_accessories_id',
		'fixed_location_campus_id',
		'responsible_user_id',
		'observation',
		'amount_ship',
		'status',
	];
}
