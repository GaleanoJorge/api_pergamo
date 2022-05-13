<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\MunicipalityIca as BaseMunicipalityIca;

class MunicipalityIca extends BaseMunicipalityIca
{
    protected $fillable = [
        'value',
        'municipality_id',
	];
}
