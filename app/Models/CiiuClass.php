<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CiiuClass as BaseCiiuClass;

class CiiuClass extends BaseCiiuClass
{
    protected $fillable = [
		'code',
    'name',
    'group_id',
         
	
	];
}
