<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PurposeService as BasePurposeService;

class PurposeService extends BasePurposeService
{
    protected $fillable = [
		'name',
		
    
	];
}
