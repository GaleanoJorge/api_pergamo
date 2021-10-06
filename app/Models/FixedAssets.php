<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedAssets as BaseFixedAssets;

class FixedAssets extends BaseFixedAssets
{
protected $fillable = [

	'name',
	'product_subcategory_id',
    'product_presentation_id',
	'consumption_unit_id',
	'factory_id',
       
	];
}
