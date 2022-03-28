<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FinancialData as BaseFinancialData;

class FinancialData extends BaseFinancialData
{
    protected $fillable = [
		'bank_information_id',
    'rut',
    
         
	
	];
}
