<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ManualPrice as BaseManualPrice;

class ManualPrice extends BaseManualPrice
{
    protected $fillable = [
		'manual_id',
    'procedure_id',
    'value',
    'price_type_id'
         
	
	];
}
