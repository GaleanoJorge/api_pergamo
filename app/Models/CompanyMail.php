<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CompanyMail as BaseCompanyMail;

class CompanyMail extends BaseCompanyMail
{
    protected $fillable = [
		'company_id',
        'mail',
        'city_id',
        'document_id' 
	
	];
}
