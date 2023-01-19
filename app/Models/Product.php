<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Product as BaseProduct;

class Product extends BaseProduct
{
protected $fillable = [
	'name',
	'factory_id',
    'product_generic_id',
	'invima_registration',
	'invima_status_id',
	'sanitary_registration_id',
	'storage_conditions_id',
	'code_cum_file',
	'code_cum_consecutive',
	'regulated_drug',
	'high_price',
	'maximum_dose',
	'indications',     
	'contraindications',  
	'applications',  
	'value_circular',  
	'circular',  
	'date_cum',  
	'unit_packing',  
	'packing_id',  
	'refrigeration',  
	'useful_life',  
	'code_cum',  
	];
}
