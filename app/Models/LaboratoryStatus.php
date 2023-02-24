<?php

namespace App\Models;

use App\Models\Base\LaboratoryStatus as BaseLaboratoryStatus;

class LaboratoryStatus extends BaseLaboratoryStatus
{
    protected $fillable = [
        'name',
    ];
}
