<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChCarePlan as BaseChCarePlan;

class ChCarePlan extends BaseChCarePlan
{
    protected $fillable = [
    'nursing_care_plan_id',
    'type_record_id',
    'ch_record_id',

	];
}
