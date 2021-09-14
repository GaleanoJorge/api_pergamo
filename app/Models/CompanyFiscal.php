<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CompanyFiscal as BaseCompanyFiscal;

class CompanyFiscal extends BaseCompanyFiscal
{
    protected $fillable = [
		'cof_company',
    'cof_characteristic',
    'cof_clasification',
         
	
	];
}
