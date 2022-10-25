<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProductSupplies as BaseProductSupplies;

class ProductSupplies extends BaseProductSupplies
{
	protected $fillable = [
		'product_group_id',
		'product_category_id',
		'product_subcategory_id',
		'size',
		'size',
		'size',
		'size',
		'measure',
		'stature',
		'description',
		'minimum_stock',
		'size_supplies_measure_id',
		'measure_supplies_measure_id',
		'dose',
		'code_gmdn',
		'product_dose_id',
	];
}
