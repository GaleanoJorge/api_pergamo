<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CommunicationTl as BaseCommunicationTl;

class CommunicationTl extends BaseCommunicationTl
{
  protected $fillable = [
    'eye_contact',
    'courtesy_rules',
    'communicative_intention',
    'communicative_purpose',
    'oral_verb_modality',
    'written_verb_modality',
    'nonsymbolic_nonverbal_modality',
    'symbolic_nonverbal_modality',
    'observations',
    'type_record_id',
    'ch_record_id',
  ];
}
