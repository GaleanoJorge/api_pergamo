<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProductDose as BaseProductDose;

class ProductDose extends BaseProductDose
{
protected $fillable = [
	'name',
	];
}
