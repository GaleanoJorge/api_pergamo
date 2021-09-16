<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CompanyCiiu as BaseCompanyCiiu;

class CompanyCiiu extends BaseCompanyCiiu
{
    protected $fillable = [
      'company_id',
      'class_id',
      'clasification_id',
	
	];
}
