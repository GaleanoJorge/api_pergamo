<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedLoan as BaseFixedLoan;

class FixedLoan extends BaseFixedLoan
{
	protected $fillable = [
		'fixed_assets_id',
		'fixed_location_campus_id',
		'own_user_id',
		'request_user_id',
		'responsible_user_id',
		'status',
		'observation',
	];
}
