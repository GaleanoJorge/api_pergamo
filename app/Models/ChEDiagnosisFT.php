<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEDiagnosisFT as BaseChEDiagnosisFT;

class ChEDiagnosisFT extends BaseChEDiagnosisFT
{
  protected $fillable = [

    'diagnosis',
    
  ];
}
