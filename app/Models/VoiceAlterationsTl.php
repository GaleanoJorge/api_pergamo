<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\VoiceAlterationsTl as BaseVoiceAlterationsTl;

class VoiceAlterationsTl extends BaseVoiceAlterationsTl
{
  protected $fillable = [
    'bell_alteration',
    'tone_alteration',
    'intensity_alteration',
    'observations',
    'type_record_id',
    'ch_record_id',
  ];
}
