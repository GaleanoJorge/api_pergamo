<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsPsychomotricity as BaseChPsPsychomotricity;

class ChPsPsychomotricity extends BaseChPsPsychomotricity
{
  protected $fillable = [
    'name',
  ];
}
