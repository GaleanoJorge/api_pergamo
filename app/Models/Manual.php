<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Manual as BaseManual;

class Manual extends BaseManual
{
    protected $fillable = [
		'name',
    'year',
    'status_id',
         
	
	];
}
