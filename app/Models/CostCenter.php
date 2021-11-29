<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CostCenter as BaseCostCenter;

class CostCenter extends BaseCostCenter
{
    protected $fillable = [
    'code',
    'name',
    

	];
}
