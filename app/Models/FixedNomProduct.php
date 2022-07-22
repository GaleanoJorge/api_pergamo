<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedNomProduct as BaseFixedNomProduct;

class FixedNomProduct extends BaseFixedNomProduct
{
	protected $fillable = [
		'name',
		'fixed_clasification_id',
	];
}
