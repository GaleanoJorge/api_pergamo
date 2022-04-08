<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChMethodPlanningGyneco as BaseChMethodPlanningGyneco;

class ChMethodPlanningGyneco extends BaseChMethodPlanningGyneco
{
  protected $fillable = [
    'name',
  ];
}
