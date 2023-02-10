<?php

namespace App\Models;

use App\Models\Base\UserChLaboratory as BaseUserChLaboratory;

class UserChLaboratory extends BaseUserChLaboratory
{
    protected $fillable = [
        'user_id',
        'ch_laboratory_id',
        'laboratory_status_id',
        'observation',
    ];
}
