<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CiiuGroup as BaseCiiuGroup;

class CiiuGroup extends BaseCiiuGroup
{
    protected $fillable = [
		'code',
    'name',
    'division_id',
         
	
	];
}
