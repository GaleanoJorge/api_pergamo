<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEDailyActivitiesOT as BaseChEDailyActivitiesOT;

class ChEDailyActivitiesOT extends BaseChEDailyActivitiesOT
{
  protected $fillable = [
    'cook',
    'kids',
    'wash',
    'game',
    'ironing',
    'walk',
    'clean',
    'sport',
    'decorate',
    'social',
    'act_floristry',
    'friends',
    'read',
    'politic',
    'view_tv',
    'religion',
    'write',
    'look',
    'arrange',
    'travel',
    'observation_activity',
    'test',
    'observation_test',

    'type_record_id',
    'ch_record_id',

  ];
}
