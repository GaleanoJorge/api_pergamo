<?php

namespace App\Models;

use App\Models\Base\ChLaboratory as BaseChLaboratory;

class ChLaboratory extends BaseChLaboratory
{
    protected $fillable = [
        'medical_order_id',
        'laboratory_status_id',
    ];
}
