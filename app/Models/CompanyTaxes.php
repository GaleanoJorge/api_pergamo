<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CompanyTaxes as BaseCompanyTaxes;

class CompanyTaxes extends BaseCompanyTaxes
{
    protected $fillable = [
		'campany_id',
    'taxes_id',
    'fiscal_clasification_id',
      
	
	];
}
