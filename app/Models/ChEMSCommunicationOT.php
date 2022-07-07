<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEMSCommunicationOT as BaseChEMSCommunicationOT;

class ChEMSCommunicationOT extends BaseChEMSCommunicationOT
{
  protected $fillable = [
    'community',
    'relatives',
    'friends',
    'health',
    'shopping',
    'foods',
    'bathe',
    'dress',
    'animals',

    'type_record_id',
    'ch_record_id',

  ];
}
