<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChAssPattern as BaseChAssPattern;

class ChAssPattern extends BaseChAssPattern
{
  protected $fillable = [
    'name',
    'type_record_id',
    'ch_record_id',
  ];
}
