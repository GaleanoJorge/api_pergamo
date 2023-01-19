<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsEpisodes as BaseChPsEpisodes;

class ChPsEpisodes extends BaseChPsEpisodes
{
  protected $fillable = [
    'name',
  ];
}
