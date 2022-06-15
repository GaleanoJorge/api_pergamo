<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\OstomiesTl as BaseOstomiesTl;

class OstomiesTl extends BaseOstomiesTl
{
  protected $fillable = [
    'jejunostomy',
    'colostomy',
    'observations',
    'type_record_id',
    'ch_record_id',
  ];
}
