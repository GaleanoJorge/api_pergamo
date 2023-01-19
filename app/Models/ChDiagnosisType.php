<?php

namespace App\Models;

use App\Models\Base\ChDiagnosisType as BaseChDiagnosisType;

class ChDiagnosisType extends BaseChDiagnosisType
{
    protected $fillable = [
        'name'
    ];
}
