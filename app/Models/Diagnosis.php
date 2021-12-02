<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Diagnosis as BaseDiagnosis;

class Diagnosis extends BaseDiagnosis
{
    protected $fillable = [
        'code',
        'name'
	];
}
