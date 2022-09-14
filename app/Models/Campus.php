<?php

namespace App\Models;

use App\Models\Base\Campus as BaseCampus;

class Campus extends BaseCampus
{
	protected $fillable = [
		'name',
		'address',
		'enable_code',
		'billing_pad_credit_note_prefix_id',
		'billing_pad_prefix_id',
		'region_id',
		'municipality_id',
	];
}
