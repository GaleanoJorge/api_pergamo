<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedStockAccessories as BaseFixedStockAccessories;

class FixedStockAccessories extends BaseFixedStockAccessories
{
	protected $fillable = [
		'amount_loan',
		'fixed_accessories_id',
	];
}
