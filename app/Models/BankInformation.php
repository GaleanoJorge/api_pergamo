<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BankInformation as BaseBankInformation;

class BankInformation extends BaseBankInformation
{
    protected $fillable = [
		'bank',
    'account_type',
    'account_number',
    
         
	
	];
}
