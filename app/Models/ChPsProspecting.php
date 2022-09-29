<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsProspecting as BaseChPsProspecting;

class ChPsProspecting extends BaseChPsProspecting
{
  protected $fillable = [
    'name',
  ];
}
