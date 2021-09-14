<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CiiuDivision as BaseCiiuDivision;

class CiiuDivision extends BaseCiiuDivision
{
    protected $fillable = [
		'cid_code',
    'cid_name',
         
	
	];
}
