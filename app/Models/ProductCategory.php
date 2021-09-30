<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProductCategory as BaseProductCategory;

class ProductCategory extends BaseProductCategory
{
protected $fillable = [

	'name',
	'product_group_id',
   
	];
}
