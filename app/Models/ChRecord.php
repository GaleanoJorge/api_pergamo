<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChRecord as BaseChRecord;

class ChRecord extends BaseChRecord
{
  protected $fillable = [
    'status',
    'date_attention',
    'admissions_id',
    'user_id',
    'date_finish',
  ];
}