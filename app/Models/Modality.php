<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Modality as BaseModality;

class Modality extends BaseModality
{
    protected $fillable = [
		'name',
		'coverage_id',
		
	];
}
