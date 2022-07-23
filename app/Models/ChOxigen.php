<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChOxigen as BaseChOxigen;

class ChOxigen extends BaseChOxigen
{
  protected $fillable = [
    'oxygen_type_id',
    'liters_per_minute_id',
    'type_record_id',
    'ch_record_id',
  ];
}
