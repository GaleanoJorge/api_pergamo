<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEMSMovPatOT as BaseChEMSMovPatOT;

class ChEMSMovPatOT extends BaseChEMSMovPatOT
{
  protected $fillable = [
    'scroll_right',
    'scroll_left',
    'get_up_right',
    'get_up_left',
    'push_right',
    'push_left',
    'pull_right',
    'pull_left',
    'transport_right',
    'transport_left',
    'attain_right',
    'attain_left',
    'bipedal_posture_right',
    'bipedal_posture_left',
    'sitting_posture_right',
    'sitting_posture_left',
    'squat_posture_right',
    'squat_posture_left',
    'use_both_hands_right',
    'use_both_hands_left',
    'alternating_movements_right',
    'alternating_movements_left',
    'dissociated_movements_right',
    'dissociated_movements_left',
    'Simultaneous_movements_right',
    'Simultaneous_movements_left',
    'bimanual_coordination_right',
    'bimanual_coordination_left',
    'hand_eye_coordination_right',
    'hand_eye_coordination_left',
    'hand_foot_coordination_right',
    'hand_foot_coordination_left',

    'type_record_id',
    'ch_record_id',

  ];
}
