<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProductConcentration as BaseProductConcentration;

class ProductConcentration extends BaseProductConcentration
{
protected $fillable = [
	'value',
	];
}
