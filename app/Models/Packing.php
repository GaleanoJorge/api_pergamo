<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Packing as BasePacking;

class Packing extends BasePacking
{
    protected $fillable = [
		'name',
	];
}
