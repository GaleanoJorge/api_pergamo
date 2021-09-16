<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CompanyFiscal as BaseCompanyFiscal;

class CompanyFiscal extends BaseCompanyFiscal
{
    protected $fillable = [
		'company_id',
    'characteristic_id',
    'clasification_id',
         
	
	];
}
