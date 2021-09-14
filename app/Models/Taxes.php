<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Taxes as BaseTaxes;

class Taxes extends BaseTaxes
{
    protected $fillable = [
		'tax_code',
    'tax_name',
	];
}
