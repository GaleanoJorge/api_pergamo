<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\RipsTypefile as BaseRipsTypefile;

class RipsTypefile extends BaseRipsTypefile
{
    protected $fillable = [
		'code',
		'name',
		
    
	];
}
