<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Factory as BaseFactory;

class Factory extends BaseFactory
{
    protected $fillable = [
		'identification_type_id',
		'identification',
		'verification',
        'name',
		'status_id',
        
		
	];
}
