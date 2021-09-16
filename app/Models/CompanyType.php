<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CompanyType as BaseCompanyType;

class CompanyType extends BaseCompanyType
{
    protected $fillable = [
		'name',
		
	];
}
