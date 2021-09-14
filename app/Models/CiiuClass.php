<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CiiuClass as BaseCiiuClass;

class CiiuClass extends BaseCiiuClass
{
    protected $fillable = [
		'cic_code',
    'cic_name',
    'cic_group',
         
	
	];
}
