<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\NomProduct as BaseNomProduct;

class NomProduct extends BaseNomProduct
{
protected $fillable = [
	'name',     
	'product_subcategory_id',     
	];
}
