<?php

namespace App\Models;

use App\Models\Base\DietOrder as BaseDietOrder;

class DietOrder extends BaseDietOrder
{
	protected $fillable = [
		'admissions_id',
		'diet_menu_id',
	];
}
