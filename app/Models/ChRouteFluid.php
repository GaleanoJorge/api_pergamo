<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChRouteFluid as BaseChRouteFluid;

class ChRouteFluid extends BaseChRouteFluid
{
    protected $fillable = [
    'name',
    'type',
	];
}
