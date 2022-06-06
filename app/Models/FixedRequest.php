<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedRequest as BaseFixedRequest;

class FixedRequest extends BaseFixedRequest
{
	protected $fillable = [
		'fixed_type_id',
		'fixed_assets_id',
		'fixed_accessories_id',
		'request_user_id',

		'patient_id',
		'request_amount',
		'status',
	];
}
