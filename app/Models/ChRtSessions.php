<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChRtSessions as BaseChRtSessions;

class ChRtSessions extends BaseChRtSessions
{
  protected $fillable = [
    'month',
    'week',
    'recommendations',
    'type_record_id',
    'ch_record_id'   


  ];
}
