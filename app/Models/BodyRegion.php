<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BodyRegion as BaseBodyRegion;

class BodyRegion extends BaseBodyRegion
{
    protected $fillable = [
    'name',
	];
}
