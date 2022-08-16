<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwHygieneHousing as BaseChSwHygieneHousing;

class ChSwHygieneHousing extends BaseChSwHygieneHousing
{
  protected $fillable = [
    'cleanliness',
    'obs_cleanliness',
    'illumination',
    'obs_illumination',
    'ventilation',
    'obs_ventilation',
    'pests',
    'obs_pests',
    'sanitary',
    'obs_sanitary',
    'trash',
    'obs_trash',
    'type_record_id',
    'ch_record_id',
  ];
}
