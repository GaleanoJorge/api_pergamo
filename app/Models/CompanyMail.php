<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CompanyMail as BaseCompanyMail;

class CompanyMail extends BaseCompanyMail
{
    protected $fillable = [
		'cma_company',
        'cma_mail',
        'cma_city',
        'cma_document' 
	
	];
}
