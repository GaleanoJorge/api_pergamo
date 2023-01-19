<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSigns as BaseChSigns;

class ChSigns extends BaseChSigns
{
  protected $fillable = [
    'name',
    'type_record_id',
    'ch_record_id',
    
  ];
}
