<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsIntelligence as BaseChPsIntelligence;

class ChPsIntelligence extends BaseChPsIntelligence
{
  protected $fillable = [
    'name',
  ];
}
