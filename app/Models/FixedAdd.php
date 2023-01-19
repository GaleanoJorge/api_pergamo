<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedAdd as BaseFixedAdd;

class FixedAdd extends BaseFixedAdd
{
	protected $fillable = [
		'status',
		'observation',
		'request_amount',
		'admissions_id',
		'responsible_user_id',
		'fixed_assets_id',
		'management_plan_id',
		'fixed_accessories_id',
		'fixed_nom_product_id',
		'fixed_location_campus_id',
		'own_fixed_user_id',
		'request_fixed_user_id',
		'procedure_id',
	];
}
