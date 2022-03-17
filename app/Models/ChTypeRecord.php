<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChTypeRecord as BaseChTypeRecord;

class ChTypeRecord extends BaseChTypeRecord
{
  protected $fillable = [
    'name'
  ];
}
