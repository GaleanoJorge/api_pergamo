<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedAssets as BaseFixedAssets;

class FixedAssets extends BaseFixedAssets
{
protected $fillable = [
	'fixed_clasification_id',
	'fixed_type_role_id',
    'fixed_property_id',
	'company_id',
	'obs_property',
	'plaque',
	'amount',
	'name',
	'model',
	'mark',
	'serial',
	'description',
	'detail_description',
	'color',
	'fixed_condition_id',
	];
}
