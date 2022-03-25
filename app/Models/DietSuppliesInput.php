<?php

namespace App\Models;

use App\Models\Base\DietSuppliesInput as BaseDietSuppliesInput;

class DietSuppliesInput extends BaseDietSuppliesInput
{
	protected $fillable = [
		'amount',
		'price',
		'invoice_number',
		'diet_supplies_id',
		'company_id',
		'campus_id',
	];
}
