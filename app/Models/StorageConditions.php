<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\StorageConditions as BaseStorageConditions;

class StorageConditions extends BaseStorageConditions
{
    protected $fillable = [
		'name',
		
    
	];
}
