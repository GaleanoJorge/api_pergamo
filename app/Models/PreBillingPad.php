<?php

namespace App\Models;

use App\Models\Base\PreBillingPad as BasePreBillingPad;

class PreBillingPad extends BasePreBillingPad
{
	protected $fillable = [
		'procedure_id',
		'admissions_id',
	];
}
