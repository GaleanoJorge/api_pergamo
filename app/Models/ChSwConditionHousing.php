<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwConditionHousing as BaseChSwConditionHousing;

class ChSwConditionHousing extends BaseChSwConditionHousing
{
  protected $fillable = [
    'water',
    'light',
    'telephone',
    'sewerage',
    'gas',
    'num_rooms',
    'persons_rooms',
    'rooms',
    'living_room',
    'dinning_room',
    'kitchen',
    'bath',
    'type_record_id',
    'ch_record_id',
  ];
}
