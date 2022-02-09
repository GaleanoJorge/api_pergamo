<?php

namespace App\Models;

use App\Models\Base\TypeOfAttention as BaseTypeOfAttention;

class TypeOfAttention extends BaseTypeOfAttention
{
	protected $fillable = [
		'name',
	];
}
