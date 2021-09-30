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
       
	];
}
