<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Product as BaseProduct;

class Product extends BaseProduct
{
protected $fillable = [
	'code',
	'name',
	'factory_id',
    'product_generic_id',
	'invima_registration',
	'invima_status_id',
	'sanitary_registration_id',
	'storage_conditions_id',
	'risk_id',
	'code_cum_file',
	'code_cum_consecutive',
	'regulated_drug',
	'high_price',
	'maximum_dose',
	'indications',     
	'contraindications',  
	'applications',  
	'minimum_stock',  
	'maximum_stock',  
	'generate_iva',  
	];
}
