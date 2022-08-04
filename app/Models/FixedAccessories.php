<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedAccessories as BaseFixedAccessories;

class FixedAccessories extends BaseFixedAccessories
{
protected $fillable = [
	'name',
	'amount_total',
	'actual_amount',
    'fixed_type_id',
    'campus_id',
	];
}
