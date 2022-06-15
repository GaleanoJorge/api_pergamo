<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChTypeFluid as BaseChTypeFluid;

class ChTypeFluid extends BaseChTypeFluid
{
    protected $fillable = [
    'name',
    'ch_route_fluid_id',
	];
}
