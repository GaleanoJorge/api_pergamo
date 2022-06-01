<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FinancialData as BaseFinancialData;

class FinancialData extends BaseFinancialData
{
    protected $fillable = [
    'user_id',
		'bank_id',
		'account_type_id',
    'rut',
    
         
	
	];
}
