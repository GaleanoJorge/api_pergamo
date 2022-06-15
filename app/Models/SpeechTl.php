<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\SpeechTl as BaseSpeechTl;

class SpeechTl extends BaseSpeechTl
{
  protected $fillable = [
    'breathing',
    'joint',
    'resonance',
    'fluency',
    'prosody',
    'observations',
    'type_record_id',
    'ch_record_id',
  ];
}
