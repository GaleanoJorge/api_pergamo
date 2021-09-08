<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CompanyCategory as BaseCompanyCategory;

class CompanyCategory extends BaseCompanyCategory
{
    protected $fillable = [
		'coc_name',
		
	];
}
