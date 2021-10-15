<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Firms as BaseFirms;

class Firms extends BaseFirms
{
    protected $fillable = [
		'name',
		
	];
}
