<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ManualPrice as BaseManualPrice;

class ManualPrice extends BaseManualPrice
{
    protected $fillable = [
    'name',
    'own_code',
    'manual_procedure_id',
    'homologous_id',
		'manual_id',
    'procedure_id',
    'product_id',
    'value',
    'price_type_id'
         
	
	];
}
