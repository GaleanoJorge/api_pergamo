<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CompanyCiiu as BaseCompanyCiiu;

class CompanyCiiu extends BaseCompanyCiiu
{
    protected $fillable = [
      'cii_company',
      'cii_class',
      'cii_clasification',
	
	];
}
