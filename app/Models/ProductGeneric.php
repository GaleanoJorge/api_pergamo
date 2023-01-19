<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProductGeneric as BaseProductGeneric;

class ProductGeneric extends BaseProductGeneric
{
protected $fillable = [
	'drug_concentration_id',
    'measurement_units_id',
	'product_presentation_id',
	'description',
	'pbs_type_id',
	'pbs_restriction',
	'nom_product_id',
	'administration_route_id',
	'special_controller_medicene',
	'code_atc',
	'implantable',
	'reuse',
	'invasive',
	'minimum_stock',  
	'maximum_stock',  
	'consignment',     
	'dose',     
	'product_dose_id',     
	'multidose_concentration_id',     
	];
}
