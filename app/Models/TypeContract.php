<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\TypeContract as BaseTypeContract;

class TypeContract extends BaseTypeContract
{
    protected $fillable = [
		'name',
		
	];
}
