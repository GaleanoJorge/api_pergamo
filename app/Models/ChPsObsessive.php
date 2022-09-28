<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsObsessive as BaseChPsObsessive;

class ChPsObsessive extends BaseChPsObsessive
{
  protected $fillable = [
    'name',
  ];
}
