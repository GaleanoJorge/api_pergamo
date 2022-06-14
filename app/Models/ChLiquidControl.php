<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChLiquidControl as BaseChLiquidControl;

class ChLiquidControl extends BaseChLiquidControl
{
    protected $fillable = [
    'clock',
    'ch_route_fluid_id',
    'ch_type_fluid_id',
    'delivered_volume',
    'bag_number',
    'type_record_id',
    'ch_record_id',

	];
}
