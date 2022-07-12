<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProductSuppliesCom as BaseProductSuppliesCom;

class ProductSuppliesCom extends BaseProductSuppliesCom
{
	protected $fillable = [
		'name',
		'factory_id',
		'product_supplies_id',
		'invima_registration',
		'invima_status_id',
		'sanitary_registration_id',
		'packing_id',
		'unit_packing',
		'code_cum_file',
		'code_cum_consecutive',
		'useful_life',
		'date_cum',
	];
}
