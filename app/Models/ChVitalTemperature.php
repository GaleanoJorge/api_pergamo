<?php

namespace App\Models; 
use App\Models\Base\ChVitalTemperature as BaseChVitalTemperature;

class  ChVitalTemperature extends BaseChVitalTemperature
{
    protected $fillable = [
        'name'
    ];
}
