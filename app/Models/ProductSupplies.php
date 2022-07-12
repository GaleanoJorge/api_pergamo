<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProductSupplies as BaseProductSupplies;

class ProductSupplies extends BaseProductSupplies
{
protected $fillable = [
	'size',     
	'measure',     
	'stature',     
	'description',     
	'minimum_stock',     
	'size_supplies_measure_id',     
	'measure_supplies_measure_id',    
	'dose',     
	'product_dose_id',  
	];
}
