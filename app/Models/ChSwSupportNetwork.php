<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwSupportNetwork as BaseChSwSupportNetwork;

class ChSwSupportNetwork extends BaseChSwSupportNetwork
{
  protected $fillable = [
    'provided',
    'sw_note',
    'ch_sw_entity_id',
    'observation',
    'ch_sw_network_id',
    'type_record_id',
    'ch_record_id',
  ];
}
