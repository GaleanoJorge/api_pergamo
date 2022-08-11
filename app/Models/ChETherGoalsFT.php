<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChETherGoalsFT as BaseChETherGoalsFT;

class ChETherGoalsFT extends BaseChETherGoalsFT
{
  protected $fillable = [
    'check1_hold',
    'check2_improve',
    'check3_structure',
    'check4_promote',
    'check5_strengthen',
    'check6_promote_2_promote_2',
    'check7_develop',
    'check8_strengthen_2',
    'check9_favor',
    'check10_functionality',

    'type_record_id',
    'ch_record_id',

  ];
}
