<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CompanyKindperson as BaseCompanyKindperson;

class CompanyKindperson extends BaseCompanyKindperson
{
    protected $fillable = [
		'name',
		
	];
}
