<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChAssSwing as BaseChAssSwing;

class ChAssSwing extends BaseChAssSwing
{
  protected $fillable = [
    'name',
    'type_record_id',
    'ch_record_id',
  ];
}
