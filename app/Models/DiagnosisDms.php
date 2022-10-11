<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\DiagnosisDms as BaseDiagnosisDms;

class DiagnosisDms extends BaseDiagnosisDms
{
    protected $fillable = [
        'code',
        'name',
        'value'
	];
}
