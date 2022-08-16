<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwFamilyDynamics as BaseChSwFamilyDynamics;

class ChSwFamilyDynamics extends BaseChSwFamilyDynamics
{
  protected $fillable = [
    'decisions_id',
    'authority_id',
    'ch_sw_communications_id',
    'ch_sw_expression_id',
    'observations',
    'type_record_id',
    'ch_record_id',
  ];
}
