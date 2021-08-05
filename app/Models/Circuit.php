<?php

namespace App\Models;

use App\Models\Base\Circuit as BaseCircuit;

class Circuit extends BaseCircuit
{
	protected $fillable = [
		'name',
		'district_id',
		'status_id'
	];
}
