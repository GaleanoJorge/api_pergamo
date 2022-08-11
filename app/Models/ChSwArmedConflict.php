<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwArmedConflict as BaseChSwArmedConflict;

class ChSwArmedConflict extends BaseChSwArmedConflict
{
  protected $fillable = [
    'victim',
    'victim_time',
    'subsidies',
    'detail_subsidies',
    'municipality_id',
    'population_group_id',
    'ethnicity_id',
    'type_record_id',
    'ch_record_id',
  ];
}
