<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Tracing as BaseTracing;

class Tracing extends BaseTracing
{
  protected $fillable = [
    'observation',
    'ch_record_id'
  ];
}
