<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Bed as BaseBed;

class Bed extends BaseBed
{
    protected $fillable = [
        'code',
        'name',
        'status_bed_id',
        'bed_or_office',
        'pavilion_id',
        'procedure_id',

    ];
}
