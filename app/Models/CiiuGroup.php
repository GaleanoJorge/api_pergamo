<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CiiuGroup as BaseCiiuGroup;

class CiiuGroup extends BaseCiiuGroup
{
    protected $fillable = [
		'cig_code',
    'cig_name',
    'cig_division',
         
	
	];
}
