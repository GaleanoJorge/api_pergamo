<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\InvimaStatus as BaseInvimaStatus;

class InvimaStatus extends BaseInvimaStatus
{
    protected $fillable = [
		'name',
		
    
	];
}
