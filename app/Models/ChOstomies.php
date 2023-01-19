<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChOstomies as BaseChOstomies;

class ChOstomies extends BaseChOstomies
{
  protected $fillable = [
    'ostomy_id',
    'observation',
    'ch_record_id',
    'type_record_id',
  
  ];
}
