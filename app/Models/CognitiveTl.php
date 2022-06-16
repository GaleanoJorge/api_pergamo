<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CognitiveTl as BaseCognitiveTl;

class CognitiveTl extends BaseCognitiveTl
{
  protected $fillable = [
    'memory',
    'attention',
    'concentration',
    'observations',
    'type_record_id',
    'ch_record_id',
  ];
}
