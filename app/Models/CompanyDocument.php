<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CompanyDocument as BaseCompanyDocument;

class CompanyDocument extends BaseCompanyDocument
{
    protected $fillable = [
		'company_id',
    'document_id',
    'file' ,
	
	];
}
