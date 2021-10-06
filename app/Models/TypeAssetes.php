<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\TypeAssets as BaseTypeAssets;

class TypeAssets extends BaseTypeAssets
{
protected $fillable = [

	'name',
	'fixed_assets_id',
    'plate_number',
	
       
	];
}
