<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProductGeneric as BaseProductGeneric;

class ProductGeneric extends BaseProductGeneric
{
protected $fillable = [

	'name',
	'drug_concentration_id',
    'measurement_units_id',
	'product_presentation_id',
	'description',
	'pbs_type_id',
	'product_subcategory_id',
	'consumption_unit_id',
	'administration_route_id',
	'special_controller_medicene_id',
	'code_atc',
	'implantable_id',
	'reuse_id',
	'invasive_id',
	'consignment_id',
       
	];
}
