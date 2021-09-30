<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProductSubcategory as BaseProductSubcategory;

class ProductSubcategory extends BaseProductSubcategory
{
protected $fillable = [

	'name',
	'product_category_id',
   
	];
}
